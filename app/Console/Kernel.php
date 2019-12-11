<?php

namespace App\Console;

use App\CompletedLevelHistory;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Level;
use App\Story;
use App\User;
use Illuminate\Support\Carbon;

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

        $schedule->call(function () {
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


                // $last_story = Story::where('is_completed','yes')->orderBy('story_number', 'desc')->value('story_number');


                if (Story::where('level_id', $level->level_number)->orderBy('story_number', 'desc')->value('is_completed') == 'yes') {
                    $users_that_passed = User::where('level_number', $level->level_number)->where('story_score', '>=', 250)->where('referral_score', '>=' , 50 )->get();
                    $users_that_failed = User::where('level_number', $level->level_number)->where('story_score', '<', 250)->orWhere('referral_score', '<' , 50 )->get();

                    $levelHistory = new CompletedLevelHistory;
                    $levelHistory->level_number = $level->level_number;
                    $levelHistory->date_level_started = $level->starting_time;
                    $levelHistory->no_of_participants = $level->participants->count();
                    $levelHistory->no_of_participants_that_did_no_complete_level = $users_that_failed->count();
                    $levelHistory->no_of_participants_that_completed_level = $users_that_passed->count();
                    $levelHistory->date_level_completed = Carbon::now();
                    $levelHistory->save();



                    $level->is_started= "no";
                    $level->starting_time = '';
                    $level->save();

                    $stories = Story::where('level_id', $level->level_number)->get();

                    foreach($stories as $story){
                        $story->is_current = 'no';
                        $story->is_completed = 'no';
                        $story->save();
                    }

                    foreach ($users_that_passed as $user) {
                        $user->increment('level_number', 1);
                        $user->save();

                        if($user->level_number == $user->level_number+1){
                        break;
                        }
                    }
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
