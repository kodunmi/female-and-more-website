<?php

namespace App\Providers;

use App\Level;
use App\Notifications\LevelStart;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;


use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    use Notifiable;
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('hasStartedLevel', function($level){

            $level = Level::where('level_number',$level)->first();

            if($level != null){

                if($level->is_started == 'yes'){

                    return true;

                }else{

                    return false;

                }

            }else{

                return false;

            }
        });
    }
}
