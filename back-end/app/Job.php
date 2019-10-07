<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function seekers()
    {
        return $this->belongsToMany('App\Seeker');
    }

    public function startup()
    {
    	return $this->belongsTo('App\Startup');
    }

    public function employees()
    {
    	return $this->belongsToMany('App\Employee');
    }
}
