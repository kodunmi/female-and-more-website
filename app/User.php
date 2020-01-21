<?php

namespace App;

use App\Notifications\Auth\VerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Questocat\Referral\Traits\UserAffiliate;


class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use UserAffiliate;

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification(){
        $this->notify(new VerifyEmail);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'country', 'state' , 'goal_to_greatness', 'image','username','dob','level_number','season_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function level()
    {
        return $this->belongsTo(Level::class, 'level_number', 'level_number');
    }


    public function actions()
    {
        return $this->hasMany(ActionBoard::class);
    }

    public function recentActions()
    {
        return $this->hasMany(ActionBoard::class)->latest()->take(5);
    }

    public function responses(){
        return $this->hasMany(Response::class)->where('level_number',auth()->user()->level_number)->where('season_number',auth()->user()->season_number);
    }


}
