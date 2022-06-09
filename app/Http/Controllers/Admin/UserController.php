<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function editUser($id){
        $user = User::find($id);
        return view('admin.users.edit-user', compact('user'));
    }


    public function updateUser($id, Request $request)
    {

        $this->validate($request, array(
            'phone' => 'required|numeric|min:5',
            'address' => 'required|string|max:191',
        ));

        $profile = User::find($id);
        $profile->phone = $request->input('phone');
        $profile->address = $request->input('address');
        if($request->hasFile('image')){
            $avatar = $request->file('image');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300,300)->save(public_path('/uploads/avatars/' . $filename));
            $profile->image = $filename;
            $profile->update();
        }
        $profile->update();
        return redirect()->back()->with('status', 'User Details Updated Successfully'); 
    }

    public function updatePassword(Request $request)
    {

        $this->validate($request, array(
            'password' => 'required|string|min:8|confirmed',
        ));

        $profile = User::find(Auth::user()->id);
        $profile->password = Hash::make($request->password);
        $profile->update();
        return redirect()->back()->with('status', 'Password Updated Successfully'); 
    }

    public function active($id)
    {
        $profile = User::find($id);
        $profile->status = '1';
        $profile->update();
        return redirect()->back()->with('status', 'User Activated');
    }

    public function deactive($id)
    {
        $profile = User::find($id);
        $profile->status = '0';
        $profile->update();
        return redirect()->back()->with('warning', 'User De-activated');
    }
}
