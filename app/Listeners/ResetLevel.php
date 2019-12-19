<?php

namespace App\Listeners;

use App\Events\LevelEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ResetLevel implements ShouldQueue
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
     * handles the level reset and increment the season number by one
     *
     * @param  LevelEnded  $event
     * @return void
     */
    public function handle(LevelEnded $event)
    {
        $event->level->is_started = "no";
        $event->level->starting_time = '';
        $event->level->increment('season_number', 1);
        $event->level->save();
    }
}
