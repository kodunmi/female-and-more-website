<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    public function stories()
    {
        return $this->hasMany(Story::class,'level_id', 'level_number');
    }

    public function currentStory(){
        return $this->hasMany(Story::class,'level_id', 'level_number')->where('is_current', 'yes');
    }

    public function completedStories(){
        return $this->hasMany(Story::class,'level_id', 'level_number')->where('is_completed', 'yes');
    }

    public function upcomingStories(){
        return $this->hasMany(Story::class,'level_id', 'level_number')->where('is_completed', 'no')->where('is_current','no');
    }


    public function participants()
    {
        return $this->hasMany(User::class, 'level_number', 'level_number');
    }


}
