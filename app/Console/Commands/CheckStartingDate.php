<?php

namespace App\Console\Commands;

use App\Level;
use Illuminate\Support\Carbon;
use Illuminate\Console\Command;

class CheckStartingDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'level:datecheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if the current day of staring a level is equal to the date set on the database starting date ';

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
        $levels = Level::where('starting_time',  '!=',  null)->get();
            $dt = Carbon::now();
            $date = $dt->toDateString();

            foreach ($levels as $level) {
                if ($date == $level->starting_time) {
                    if ($level->starting_time != 'yes') {
                        $level->is_started = 'yes';
                        $level->save();
                    }
                }
            }
    }
}
