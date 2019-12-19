<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $table = 'responses';

    protected $fillable = [
        'user_id','level_number','season_number','response','story_number'
    ];
}
