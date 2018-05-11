<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public $timestamps = false;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function projectPermission() {
        return $this->hasMany('App\Project_Permission_Xref');
    }

    public function categoryPermission() {
        return $this->hasMany('App\Category_Permission_Xref');
    }

    public function project() {
        return $this->hasManyThrough('App\Project', 'App\Project_Permission_Xref', 'user_id','id','id','project_id');
    }

    public function category() {
        return $this->hasManyThrough('App\Category', 'App\Category_Permission_Xref', 'user_id', 'id', 'id', 'category_id');
    }

}
