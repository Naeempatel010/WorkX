<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investor extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function investments()
    {
        return $this->hasMany('App\Investment');
    }

    public function conversations()
    {
        return $this->hasMany('App\Conversation');
    }
    
}
