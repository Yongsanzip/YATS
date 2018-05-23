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

    public function project($auth = null) {
        if($auth) {
            return $this->hasManyThrough('App\Project', 'App\Project_Permission_Xref', 'user_id', 'id',
                'id', 'project_id', function ($q, $auth)
                {
                   $q->where('grade', "=", $auth);
                });
            }
        else
            return $this->hasManyThrough('App\Project', 'App\Project_Permission_Xref', 'user_id','id','id','project_id');
    }

    public function category() {
        return $this->hasManyThrough('App\Category', 'App\Category_Permission_Xref', 'user_id', 'id', 'id', 'category_id');
    }


    public static function get_category_list($user_id, $project_id, $category_id = null){
        if($category_id) {
            $eachList = Category::find($category_id)->category;
        }
        else {
            $eachList = Project::find($project_id)->category;
        }

        $list = array();

        foreach($eachList as $categoryItem){
            $temp = [
                $name = $categoryItem->name,
                $desc = $categoryItem->desc,
                $permission = Category_permission_xref::whereUserId($user_id)->whereCategoryId($categoryItem->id)->permission,
                $apis = array($categoryItem->api),
                $categories = array(function($user_id, $project_id, $categoryItem) {
                    if (Category::where("c_id", "=", $categoryItem->id)->count() > 0) {
                        self::get_category_list($user_id, $project_id, $categoryItem->id);
                    }
                    else
                        return null;
                }
                )
            ];
            if(strpos($temp->permmission,"r"))
                array_push($list, $temp);
        }
    }
}
