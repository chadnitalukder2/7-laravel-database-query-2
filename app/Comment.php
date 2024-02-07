<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
   /* protected static function booted()
    {
        static::addGlobalScope('rating', function(Builder $builder){
            $builder->where('rating', '>', 2);
        }); 
    }*/

    // public function scopeRating($query, int $value = 4)
    // {
    //     return $query->where('rating', '>', $value);
    // }
}
