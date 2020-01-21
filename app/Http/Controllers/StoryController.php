<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnswerSubmitRequest;
use App\Http\Requests\CreateStoryRequest;
use App\Story;
use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class StoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stories = Story::all();
        return view('admin.pages.view-stories',['stories' => $stories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();

        return view('admin.pages.add-story',['levels' => $levels]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateStoryRequest $request)
    {
        $request->storeStoryImage()->storeStory();

        return back()->with(['message' => 'story created successfully', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function show(Story $story)
    {
        return view('frontend.pages.story-detail',['story'=>$story]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function edit(Story $story)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Story $story)
    {
        if($request->hasFile('image')){
            $filePath = 'public/story/'.$story->icon_image;

            if(Storage::exists($filePath)){
                Storage::delete($filePath);
            }

            $uploadedFile = $request->file('image');
            $fileName =  Hash::make($request->name).'.'.$uploadedFile->getClientOriginalExtension();
            $uploadedFile->storePubliclyAs('public/story',$request->fileName);
        }


        $story->story_number = $request->story_number;
        $story->story_week_number = $request->week_no;
        $story->icon_name = $request->name;
        $request->hasFile('image') ? $story->icon_image = $fileName :'';
        $story->icon_career_path = $request->career;
        $story->icon_profile = $request->profile;
        $story->icon_quote = $request->quote;
        $story->icon_experience = $request->experience;
        $story->icon_step_to_glory = $request->glory;
        $story->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Story  $story
     * @return \Illuminate\Http\Response
     */
    public function destroy(Story $story)
    {
        //
    }

    /**
     * This is for submitting answer
     *
     * @param  \App\Story  $story_number
     * @return \Illuminate\Http\Response
     */
    public function submitDayAnswer(AnswerSubmitRequest $request, $story_number){
        $request->increaseUserScore()->storeResponse($story_number);

        return back()->with([
            'message' => 'your response for the day was submitted successfully',
            'alert-type' => 'success'
            ]);
    }
}
