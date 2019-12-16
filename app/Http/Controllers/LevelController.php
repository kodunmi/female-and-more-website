<?php

namespace App\Http\Controllers;

use App\CompletedLevelHistory;
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

    public function startLevel(Level $level, Request $request){
        $this->validate($request,[
            'starting_date' => ['required', 'date']
            // 'season_number' => 'required'
        ]);

        $level->starting_time = $request->starting_date;
        // $level->season_number = $request->season_number;
        $level->save();

        return back()->with([
            'message' => 'starting date updated successfully',
            'alert-type' => 'success'
            ]);

    }
}
