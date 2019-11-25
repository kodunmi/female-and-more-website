<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function dashboard()
    {
        //$user = User::find(Auth::id());

        $url = url('/register/');

        // auth()->user()->generateAffiliateId();

        //  $link = $user->getAffiliateLink($url);

        // dd(auth()->user()->referrals()->count());

        return view('frontend.pages.dashboard')->with([ 'url' => $url]);
    }
}
