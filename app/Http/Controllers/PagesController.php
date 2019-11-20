<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home()
    {
        return view('frontend.pages.home');
    }

    public function aboutFam()
    {
        return view('frontend.pages.aboutFam');
    }

    public function howToParticipate()
    {
        return view('frontend.pages.howToParticipate');
    }

    public function howToStartAChapter()
    {
        return view('frontend.pages.howToStartAChapter');
    }

    public function causes()
    {
        return view('frontend.pages.causes');
    }

    public function leardersBoard()
    {
        return view('frontend.pages.leardersBoard');
    }

    public function gallary()
    {
        return view('frontend.pages.gallary');
    }
}
