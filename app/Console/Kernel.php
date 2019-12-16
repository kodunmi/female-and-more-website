<?php

namespace App\Console;

use App\Events\LevelEnded;
use App\Level;
use App\Notifications\UserFailed;
use App\Notifications\UserPassed;
use App\User;
use App\Story;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;


class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //check if any level has a starting date and it updates the db when the day == to the current day

        $schedule->command('level:datecheck')->everyMinute();
        // $schedule->command('level:start')->everyMinute();
        $schedule->call(function(){
            $levels = Level::where('is_started', 'yes')->get();
            foreach ($levels as $level) {
                $story = Story::where('is_current', 'yes')->where('level_id', $level->level_number)->first();
                if ($story == null) {
                    $first_story = Story::where('level_id', $level->level_number)->orderBy('story_number', 'asc')->first();
                    $first_story->is_current = 'yes';
                    $first_story->save();
                } else {
                    $current_story = Story::where('is_current', 'yes')->where('level_id', $level->level_number)->first();
                    $next_story = Story::where('level_id', $level->level_number)->where('id', '>', $current_story->id)->orderBy('id', 'asc')->first();

                    if ($next_story != null) {
                        $next_story->is_current = 'yes';
                        $next_story->save();
                    }

                    $current_story->is_current = 'no';
                    $current_story->is_completed = 'yes';
                    $current_story->save();
                }

                if (Story::where('level_id', $level->level_number)->orderBy('story_number', 'desc')->value('is_completed') == 'yes') {
                    event(new LevelEnded($level));
                }
            }
        })->everyMinute();

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
