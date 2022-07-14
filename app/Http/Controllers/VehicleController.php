<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $vehicles = Vehicle::all();
        return view('vehicle.index', compact('vehicles'));
    }
    public function create()
    {
        # code...
        $vehicle = new Vehicle();
        return view('vehicle.create', compact('vehicle'));
    }

    public function validateData()
    {
        # code...
        return request()->validate([
            'brand' => 'required',
            'model' => 'sometimes',
            'description' => 'sometimes',
            'cost' => 'required',
            'img_url' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }
    
    /**
     * store vehicle function
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validateData();

        $vehicle = Vehicle::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'description' => $request->description,
            'cost' => $request->cost,

        ]);

        $vehicle->save();

        $this->storeImage($vehicle);

        return redirect()->route('vehicle.index');
    }
    
    /**
     * store Image function
     *
     * @param  mixed $vehicle
     * @return void
     */
    public function storeImage($vehicle)
    {
        if(request()->has('img_url')){
            $vehicle->update([
                'img_url' => request()->img_url->store('assets/img/vehicles', 'public'),
            ]);
            $image = Image::make(public_path('storage/' . $vehicle->img_url))->fit(640, 428);
            $image->save();
        }

    }

    public function edit(Vehicle $vehicle)
    {

        return view('vehicle.edit', compact('vehicle'));
    }
    
    /**
     * update vehicle function
     *
     * @param  mixed $request
     * @param  mixed $vehicle
     * @return void
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $this->validateData();
        
        $status = $request->status ? 0 : 1; // out for maintenance or not

        $vehicle->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'description' => $request->description,
            'cost' => $request->cost,
            'status' => $status
        ]);

        $this->storeImage($vehicle);

        return redirect()->route('vehicle.index');
    }
}
