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
            'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }

    public function validateDataNoImg()
    {
        # code...
        return request()->validate([
            'brand' => 'required',
            'model' => 'sometimes',
            'description' => 'sometimes',
            'cost' => 'required',
            //   'img_url' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
    }
    public function store(Request $request)
    {

        $this->validateData();

        $image = $request->file('img_url');
        $imgName = time() . '.' . $image->extension();
        $destinationPath = public_path('assets/img/vehicles/');

        $img = Image::make($image->path());
        $img->resize(640, 428, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath . '/' . $imgName);


        $vehicle = new Vehicle();

        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->description = $request->description;
        $vehicle->cost = $request->cost;
        $vehicle->img_url = $imgName;

        $vehicle->save();

        return redirect()->route('vehicle.index');
    }

    public function edit(Vehicle $vehicle)
    {

        return view('vehicle.edit', compact('vehicle'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $imgName = '';

        if (request()->hasFile('img_url')) {
            $this->validateData();

            $image = $request->file('img_url');
            $imgName = time() . '.' . $image->extension();
            $destinationPath = public_path('assets/img/vehicles/');

            $img = Image::make($image->path());
            $img->resize(800, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $imgName);
        } else {
            $this->validateDataNoImg();
            $imgName = $vehicle->img_url;
        }

        $status = $request->status ? 0 : 1; // out for maintenance or not

        Vehicle::find($vehicle->id)->update([
            'brand' => $request->brand,
            'model' => $request->model,
            'description' => $request->description,
            'cost' => $request->cost,
            'status' => $status,
            'img_url' => $imgName
        ]);

        return redirect()->route('vehicle.index');
    }
}
