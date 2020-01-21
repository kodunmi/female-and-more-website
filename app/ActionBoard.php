<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionBoard extends Model
{
    protected $fillable =['action_text','user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
