<?php

namespace App\Providers;

use App\Level;
use App\Response;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;


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

        Blade::if('hasAnswerForTheDay', function($story_number){
            $story = Response::where('user_id', auth()->id())
                                ->where('level_number', auth()->user()->level_number)
                                ->where('season_number', auth()->user()->season_number)
                                ->where('story_number',$story_number)->first();
            if($story != null){
                return true;
            }else{
                return false;
            }

        });

        Schema::defaultStringLength(191);
    }
}
