<?php

namespace App\Listeners;

use App\Level;
use App\User;
use App\Events\LevelEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LevelParticipantsEnterNextLevel implements ShouldQueue
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
     * this is for updating users level and season to the next level and next season
     *
     * if a user fails the season is increased by one but the level remains thesame
     *
     * if a user passes the level and season is changed to the next level's level and season
     *
     * @param  LevelEnded  $event
     * @return void
     */
    public function handle(LevelEnded $event)
    {
        $users_that_passed = User::where('level_number', $event->level->level_number)->where('season_number', $event->level->season_number)->where('story_score', '>=', 250)->where('referral_score', '>=', 50)->get();

        foreach ($users_that_passed as $user)
        {
            $current_level = User::where('level_number', $user->level_number)->first();

            $next_level = Level::where('id', '>', $current_level->id)->orderBy('id', 'asc')->first();

            if ($next_level != null) {

                $user->level_number = $next_level->level_number;

                $user->season_number = $next_level->season_number;

                $user->save();
            } else {

                $user->increment('level_number', 1);

                $user->save();
            }
        }

        $users_that_failed = User::where('level_number', $event->level->level_number)->where('season_number', $event->level->season_number)->where('story_score', '<', 250)->orWhere('referral_score', '<', 50)->get();

        foreach ($users_that_failed as $user)
        {
            $user->increment('season_number', 1);

            $user->save();
        }
    }
}
