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
        return $this->belongsToMany('App\Jobs');
    }

    public function resume()
    {
    	return $this->hasOne('App\Resume');
    }
}
