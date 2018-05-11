<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    //
    public function parameter() {
        return $this->hasMany('App\Parameter');
    }

    public function category() {
        return $this->belongsTo('App\Category');
    }
}
