<?php

namespace App\Listeners;

use App\Story;
use App\Events\LevelEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ResetLevelStories implements ShouldQueue
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
        $stories = Story::where('level_id', $event->level->level_number)->get();

        foreach ($stories as $story) {
            $story->is_current = 'no';
            $story->is_completed = 'no';
            $story->save();
        }
    }
}
