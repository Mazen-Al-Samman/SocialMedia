<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    protected $table = 'comments' ;

         public function user()
        {
            return $this->belongsTo('App\User');
        }

        public function tweet()
        {
            return $this->belongsTo('App\Tweets');
        }

}