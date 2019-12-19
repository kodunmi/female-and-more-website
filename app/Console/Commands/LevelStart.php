<?php

namespace App\Console\Commands;

use App\Level;
use App\Story;
use App\Events\LevelEnded;
use Illuminate\Console\Command;

class LevelStart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'level:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Start a new level and daily story';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       //checks if any level is running
       $levels = Level::where('is_started', 'yes')->get();

       foreach ($levels as $level) {

           //checks and switch story from day to day
           $story = Story::where('is_current', 'yes')->where('level_id', $level->level_number)->first();

           if ($story == null)
           {
               $first_story = Story::where('level_id', $level->level_number)->orderBy('story_number', 'asc')->first();

               $first_story->is_current = 'yes';

               $first_story->save();

           } else {

               $current_story = Story::where('is_current', 'yes')->where('level_id', $level->level_number)->first();

               $next_story = Story::where('level_id', $level->level_number)->where('id', '>', $current_story->id)->orderBy('id', 'asc')->first();

               if ($next_story != null)
               {
                   $next_story->is_current = 'yes';

                   $next_story->save();
               }

               $current_story->is_current = 'no';

               $current_story->is_completed = 'yes';

               $current_story->save();
           }
           //checks if the current story is the last story of the level and fires level event
           if (Story::where('level_id', $level->level_number)->orderBy('story_number', 'desc')->value('is_completed') == 'yes')
           {
               event(new LevelEnded($level));
           }
       }
    }
}
