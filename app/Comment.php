<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{

    use SoftDeletes;
     //-------------------------------------------
    protected $casts = [
        'rating' => 'float',
    ];
    //-------------------------------------------
    // protected $fillable = ['rating', 'content', 'user_id'];
    protected $guarded = [];
    
    // protected $dispatchesEvents = [
    //     'saved' => 'class to handle saved event',
    //     'deleted' => 'class to handle deleted event'
    // ];
    //--------------------------------------
    protected static function booted()
    {
        // static::addGlobalScope('rating', function(Builder $builder){
        //     $builder->where('rating', '>', 2);
        // }); 
        //--------------------------------------
        static::retrieved(function ($comment) {
            // echo $comment->rating;
        });
    }

    public function scopeRating($query, int $value = 4)
    {
        return $query->where('rating', '>', $value);
    }
    //-----------------------------------

    public function getRatingAttribute($value)
    {
        return $value + 10;
    }

    public function getWhoWhatAttribute()
    {
        return "user {$this->user_id} rates {$this->rating}";
    }

    public function setRatingAttribute($value)
    {
        $this->attributes['rating'] = $value + 1; 
    }

    //===================relationship==================
    public function user()
    {
      return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function country()
    {
        return $this->hasOneThrough('App\Address', 'App\User', 'id', 'user_id', 'user_id', 'id')->select('country as name');
    }

}
