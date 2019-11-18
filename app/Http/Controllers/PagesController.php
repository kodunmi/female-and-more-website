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
        return view('frontend.pages.about-fam');
    }

    public function howToParticipate()
    {
        return view('frontend.pages.how-to-participate');
    }

    public function howToStartAChapter()
    {
        return view('frontend.pages.how-to-start-a-chapter');
    }

    public function causes()
    {
        return view('frontend.pages.causes');
    }

    public function leardersBoard()
    {
        return view('frontend.pages.learders-board');
    }

    public function gallary()
    {
        return view('frontend.pages.gallary');
    }
}
