<?php

namespace App\Listeners;

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
     * @param  LevelEnded  $event
     * @return void
     */
    public function handle(LevelEnded $event)
    {
        $users_that_passed = User::where('level_number', $event->level->level_number)->where('story_score', '>=', 250)->where('referral_score', '>=', 50)->get();
        foreach ($users_that_passed as $user) {
            $user->increment('level_number', 1);
            $user->save();
        }
    }
}
