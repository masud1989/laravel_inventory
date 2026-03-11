<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
   public function AdminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function AdminProfile()
    {
         $id = Auth::user()->id;
        $editData = User::find($id);
        // return view('admin.admin_profile_edit',compact('editData'));
        return view('admin.admin_profile', compact('editData'));
    }

     public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        // $data->email = $request->email;
        // $data->username = $request->username;

        if ($request->file('photo')) {
           $file = $request->file('photo');

           $filename = date('YmdHi').$file->getClientOriginalName();
           $file->move(public_path('upload/admin_images'),$filename);
           $data['photo'] = $filename;
        }
        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);

    }

    public function ChangePassword(){
        return view('admin.admin_change_password');
    }// End Method


    public function UpdatePassword(Request $request){

        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',

        ]);

        $hashedPassword = Auth::user()->password;
        if (Hash::check($request->oldpassword,$hashedPassword )) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message','Password Updated Successfully');
            return redirect()->back();
        } else{
            session()->flash('message','Old password is not match');
            return redirect()->back();
        }

    }// End Method

}
