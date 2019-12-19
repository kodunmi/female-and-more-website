<?php

namespace App\Listeners;
use App\History;
use App\Events\LevelEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreParticipantsData implements ShouldQueue
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
     * this stores the user level and season history for record purpose
     *
     * @param  StoreLevelData  $event
     * @return void
     */
    public function handle(LevelEnded $event)
    {
        foreach($event->level->participants as $user){
            History::create([
                'user_id' => $user->id,
                'user_name' => $user->name,
                'level_number' => $user->level_number,
                'season_number' => $user->season_number,
                'referral_score' => $user->referral_score,
                'story_score' => $user->story_score,
                'total_score' => $user->total_score
            ]);
        }
    }
}
