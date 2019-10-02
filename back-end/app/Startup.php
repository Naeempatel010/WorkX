<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Startup extends Model
{
    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }
}
