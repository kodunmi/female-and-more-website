<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{

    protected $table = 'histories';
    protected $fillable =  [
        'user_id','user_name','level_number','season_number','referral_score','story_score','total_score'
    ];
}
