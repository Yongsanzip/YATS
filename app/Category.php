<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function api() {
        return $this->hasMany('App\Api');
    }

    public function project() {
        return $this->belongsTo('App\Project');
    }
}
