<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function rooms()
    {
        return $this->belongsToMany('App\Room', 'city_rooms', 'city_id', 'room_id')->withPivot('created_at', 'updated_at');
    }
}
