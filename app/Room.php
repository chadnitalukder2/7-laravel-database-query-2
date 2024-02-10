<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    public function cities()
    {
        return $this->belongsToMany('App\City', 'city_rooms', 'room_id', 'city_id')->withPivot('created_at', 'updated_at');
    }//wherePiovt(), wherePivotNotIn(), wherePivotIn('priority', [1,2])
}
