<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
    //

    public function api() {
        return $this->belongsTo('App\Api');
    }
}
