<?php

namespace App\Http\Controllers;

use App\Story;
use Thomasjohnkane\Snooze\ScheduledNotification;
use Illuminate\Support\Carbon;
use App\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $levels = Level::orderBy('level_number', 'desc')->get();
        return view('admin.pages.view-levels',['levels' => $levels]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.add-level');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'level_name' => 'required',
        'level_description' => 'required',
        'level_number' => ['required','numeric','unique:levels,level_number']
        ]);

        $level = new Level;
        $level->level_name = $request->level_name;
        $level->level_description = $request->level_description;
        $level->level_number = $request->level_number;
        $level->season_number = 1;
        $level->save();

        return back()->with([
            'message' => 'level created successfully',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $level->level_name = $request->level_name;
        $level->level_description = $request->level_description;
        $level->save();

        return back()->with(['message' => 'level updated successfully', 'alert-type' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {
        //
    }

      /**
     * start a specific level
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function startLevel(Level $level, Request $request){
        $this->validate($request,[
            'starting_date' => ['required', 'date']
        ]);

        $stories = $level->stories()->count();

        if($stories < 2){
            return back()->with([
                'message' => 'to start a level, the level must have at least two stories. This level has '.$stories.' stories',
                'alert-type' => 'danger'
                ]);
        }

        $level->starting_time = $request->starting_date;
        $level->save();


        // this notify level participant 3 and a day before the level starts
        foreach($level->participants as $user){

            $date = Carbon::parse($level->starting_time);

        //     ScheduledNotification::create(
        //         $user, // Target
        //         new LevelStart($level), // Notification
        //         $date->subDays(3) // Send At
        //    );
        //     ScheduledNotification::create(
        //         $user, // Target
        //         new LevelStart($level), // Notification
        //         $date->subDays(1) // Send At
        //    );

        }

        return back()->with([
            'message' => 'starting date updated successfully',
            'alert-type' => 'success'
            ]);

    }
}
