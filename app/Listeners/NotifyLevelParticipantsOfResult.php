<?php

namespace App\Listeners;

use App\User;
use App\Events\LevelEnded;
use App\Notifications\UserFailed;
use App\Notifications\UserPassed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyLevelParticipantsOfResult implements ShouldQueue
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
     * this notifies level season participants of score and progress status
     *
     *
     * @param  LevelEnded  $event
     * @return void
     */
    public function handle(LevelEnded $event)
    {
        $users_that_passed = User::where('level_number', $event->level->level_number)->where('season_number', $event->level->season_number)->where('story_score', '>=', 250)->where('referral_score', '>=', 50)->get();
        // $users_that_failed = User::where('level_number', $event->level->level_number)->where('season_number', $event->level->season_number)->where('story_score', '<', 250)->orWhere('referral_score', '<', 50)->get();

        $users_that_failed = User::where('level_number', $event->level->level_number)->where('season_number', $event->level->season_number)->where(function($query){
            $query->where('story_score', '<', 250)->orWhere('referral_score', '<', 50);
        })->get();

        foreach ($users_that_passed as $user) {
            $user->notify(new UserPassed($user));
        }


        foreach ($users_that_failed as $user) {
            $user->notify(new UserFailed($user));
        }
    }
}
