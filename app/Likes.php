<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    protected $table = 'likes' ;

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function tweets()
    {
        return $this->belongsTo('App\Tweets');
    }

    public function liked(){
        $this->liked = 1 ;
    }

}