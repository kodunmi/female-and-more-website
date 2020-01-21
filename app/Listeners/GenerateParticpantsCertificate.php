<?php

namespace App\Listeners;
use App\User;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Storage;
use App\Events\LevelEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class GenerateParticpantsCertificate implements ShouldQueue
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
     * checks if level season file exist in storage
     *
     * create a new level season file
     *
     * generate certificate and store in the newly created file
     *
     * @param  LevelEnded  $event
     * @return void
     */
    public function handle(LevelEnded $event)
    {
        $certificateDirectory = 'public/certificates/level'.$event->level->level_number.'-season'.$event->level->season_number.'-'.'certificates/';
        $users_that_passed = User::where('level_number', $event->level->level_number)->where('season_number', $event->level->season_number)->where('story_score', '>=', 250)->where('referral_score', '>=', 50)->get();

        if(!Storage::exists($certificateDirectory)){
            Storage::makeDirectory($certificateDirectory);
        }

        foreach($users_that_passed  as $data){
            $pdf = PDF::setPaper('landscape')->loadView('frontend.certificates.fam-online-cert2',$data);
            Storage::put($certificateDirectory.str_slug($data['name']).'-id-'.$data['id'].'-level-'.$data['level_number'].'.pdf', $pdf->output());
        }
    }

}
