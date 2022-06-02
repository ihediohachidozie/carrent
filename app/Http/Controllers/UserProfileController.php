<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showUserProfile()
    {
        return view('profile.userprofile');
    }

    /**
     * change user name function.
     *
     * @return \Illuminate\Http\Response
     */
    public function changeName(Request $request, User $user)
    {
        //
        $data = request()->validate([
            'name' => 'required'
        ]);

        $user->update($data);


        session()->flash('name', 'User name changed successfully!');
        return back();
    }

    /**
     * change password function.
     *
     * @return \Illuminate\Http\Response
     */
    public function changePassword(Request $request, User $user)
    {
        //
        $data = request()->validate([
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'currentpassword' => ['required', 'current_password']
        ]);


        $old_password = $user->password;


        if (Hash::check($request->currentpassword, $old_password)) {

            if (!Hash::check($request->newpassword, $old_password)) {
                $user->password = Hash::make($request->password);
                $user->save();
                session()->flash('password', 'password updated successfully');
                return back();
            } else {
                session()->flash('password', 'new password can not be the old password!');
                return back();
            }
        } else {
            session()->flash('password', 'old password doesnt matched ');
            return back();
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
