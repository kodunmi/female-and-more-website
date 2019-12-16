<?php

namespace App\Listeners;

use App\Events\LevelEnded;
use App\LevelHistory;
use App\User;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreLevelDetails implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StoreLevelData  $event
     * @return void
     */
    public function handle(LevelEnded $event)
    {
        $users_that_passed = User::where('level_number', $event->level->level_number)->where('story_score', '>=', 250)->where('referral_score', '>=', 50)->get();
        $users_that_failed = User::where('level_number', $event->level->level_number)->where('story_score', '<', 250)->orWhere('referral_score', '<', 50)->get();

        $levelHistory = new LevelHistory;
        $levelHistory->level_number = $event->level->level_number;
        $levelHistory->season_number = $event->level->season_number;
        $levelHistory->date_level_started = $event->level->starting_time;
        $levelHistory->no_of_participants = $event->level->participants->count();
        $levelHistory->no_of_participants_that_did_no_complete_level = $users_that_failed->count();
        $levelHistory->no_of_participants_that_completed_level = $users_that_passed->count();
        $levelHistory->date_level_completed = Carbon::now();
        $levelHistory->save();
    }
}
