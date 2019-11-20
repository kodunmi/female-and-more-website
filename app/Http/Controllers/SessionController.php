<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Admin;
use App\Http\Requests\CreateAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    

    public function showRegistrationForm(){

        return view('admin.pages.register');
    }
    public function register(CreateAdminRequest $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|confirmed',
            'department' => 'required',
            'position' => 'required',
            'image' => 'image|required|mimes:jpg,jpeg,png'
        ]);
       
        $uploadedFile = $request->image;
        $fileName =  str_slug($request->name).'.'.$uploadedFile->getClientOriginalExtension();
        $uploadedFile->storePubliclyAs('admins',$fileName);
        //$image = $request->file('image');
        // $image_name = time().'.'.$image->getClientOriginalExtension();
        // $path = public_path()."/admin/profile/";
        // Image::make($image)->resize(200,200)->save($path.$image_name);
        
        

        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->department = $request->department;
        $admin->position = $request->position;
        $admin->image = 'admins/'.$fileName;
        $admin->password = Hash::make($request->password);
        $admin->save();

        //this authenticate, login and redirect admin to dashboard
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->route('admin.dashboard');
        }

    }

}
