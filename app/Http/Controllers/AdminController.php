<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function home(){
        return view('admin.pages.home');
    }

    public function allUsers(){
        $users = User::all();
        return view('admin.pages.view-users',['users' => $users]);
    }
}
