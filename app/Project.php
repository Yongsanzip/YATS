<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $table = "Projects";

    public $timestamps = false;

    public function category() {
        return $this->hasMany('App\Category');
    }

    public function projectPermissionXref() {
        return $this->hasMany('App\Project_Permission_Xref');
    }


}
