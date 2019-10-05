<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public function creator()
    {
    	return $this->belongsTo('App\Creator');
    }

    public function investments()
    {
        return $this->hasMany('App\Investments');
    }

    public function startup()
    {
        return $this->hasOne('App\Startup');
    }

    public function poc()
    {
        return $this->hasOne('App\Poc');
    }
}
