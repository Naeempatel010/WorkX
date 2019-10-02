<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    public function seekers()
    {
        return $this->belongsToMany('App\Seekers');
    }
}
