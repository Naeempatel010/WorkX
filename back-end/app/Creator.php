<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Creator extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function ideas()
    {
    	return $this->hasMany('App\Idea');
    }

    public function startups()
    {
    	return $this->hasMany('App\Startup');
    }
}
