<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function getRouteKeyName()
    {
        return 'story_number';
    }
}
