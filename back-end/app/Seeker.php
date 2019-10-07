<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seeker extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function jobs()
    {
        return $this->belongsToMany('App\Job');
    }

    public function resume()
    {
    	return $this->hasOne('App\Resume');
    }

    public function employee()
    {
        return $this->hasOne('App\Employee');
    }
}
