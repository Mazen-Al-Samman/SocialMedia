<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweets extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comments');
    }

    public function likes()
    {
        return $this->hasMany('App\Likes')->where('liked' , '=' , '1');
    }
}