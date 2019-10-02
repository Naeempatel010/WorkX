<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Idea extends Model
{
    public function creator()
    {
    	return $this->belongsTo('App\Creator');
    }
}
