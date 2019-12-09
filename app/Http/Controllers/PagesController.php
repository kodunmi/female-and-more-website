<?php

namespace App\Http\Controllers;


use App\User;
use App\Story;
use App\Level;

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
        $users = User::orderBy('total_score', 'desc')->get();

        //return response()->json( $users);
        // dd($users);
        return view('frontend.pages.leardersBoard')->with(['users' => $users]);
    }

    public function gallary()
    {
        return view('frontend.pages.gallary');
    }

    public function storyDetail()
    {
        return view('frontend.pages.story-detail');
     }

     public function profile($username){
        $user = User::where('username', $username)->first();

        return view('frontend.pages.profile')->with(['user' => $user]);
     }

     public function users(){
         $users = User::paginate(51);
         return view('frontend.pages.users')->with(['users' => $users]);
     }

     public function stories($id){

        $level = Level::where('level_number',$id)->first();
        $upcomingStories = $level->upcomingStories;
        $stories = $level->stories;
        $currentStory= $level->currentStory;
        $completedStories = $level->completedStories;
        $levelUser = $level->participants;

        // return response()->json([
        //     'stories' => $stories,
        //     'currentStory' => $currentStory,
        //     'completedStories' => $completedStories,
        //     'upcomingStories'   => $upcomingStories,
        //     'levelUser'   => $levelUser

        // ]);


        return view('frontend.pages.stories',['level' => $level]);
     }
}
