<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Admin;
use App\Http\Requests\CreateAdminRequest;
use App\Http\Requests\LogoutAdminRequest;
use App\Http\Requests\LoginAdminRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function __construct() {
        $this->middleware('guest:admin')->except('logout');
    }

    

    public function showRegistrationForm(){

        return view('admin.pages.register');
    }
    public function register(CreateAdminRequest $request){
       
        $request->validateAdmin()->uploadAdminImage()->storeAdmin()->logAdminIn();
        
        return redirect()->route('admin.dashboard');

    }

    public function showLoginForm(){

        return view('admin.pages.login');
    }


    public function login(LoginAdminRequest $request){

        $request->validateAdmin();

        
        if ($request->isAdmin()) {

            $request->session()->flash('message', 'welcome back');
            return redirect()->route('admin.dashboard');
        }
        // Authentication failed, redirect back to the login form
        return redirect()->back()->withErrors("we don't have your record! Please Check Your Credentials")->withInput( $request->only('email', 'remember') );
    }

    public function logout(LogoutAdminRequest $request)
    {
        $request->logout();

        return redirect()->guest(route( 'admin.login' ));
    }

}
