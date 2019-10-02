<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    public function investor()
    {
        return $this->belongsTo('App\Investor');
    }

    public function idea()
    {
        return $this->belongsTo('App\Idea');
    }
}
