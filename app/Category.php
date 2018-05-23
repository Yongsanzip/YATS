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

    public function categoryList($user) {
        $arr = array();
        foreach ($user->project as $item) {
            $tmp = [$id = $item->id, $name = $item->name, $grade = $item->Category_permission_xref->where('user_id','=',$item->id)->where()];
            array_push($arr, $tmp);
        }
    }
}
