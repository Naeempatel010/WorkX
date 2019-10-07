<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }

    public function creator()
    {
    	return $this->belongsTo('App\Creator');
    }

    public function jobs()
    {
    	return $this->hasMany('App\Job');
    }
}
