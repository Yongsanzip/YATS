<?php

namespace App\Http\Controllers;

use App\Category;
use App\Category_permission_xref;
use App\Project;
use App\Project_permission_xref;
use App\User;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    //
    public function index(Request $request, $userId) {
//        $user = User::all()->where('id','=','1');
        $list['projects'] = array();
        $projects = Project_permission_xref::all()->where('user_id', '=', $userId);

        foreach ($projects as $key => $value) {
//            $list['projects'] = Project::all()->where()
        }
    }

    public static function get_project_list($user) {
        $que = array();
        foreach($user->project as $p){
            $temp = [
                $id = $p->id,
                $name = $p->name,
                $desc = $p->desc,
                $grade = $p->projectPermissionXref->where("project_id","=",$p->id)->where("user_id", "=", $user->id)->first()->grade,
                $category = array($p,function($param, $user){
                    $param->category->whereUserId($user->id)->where("permission","like","%r%");
                })
            ];
            array_push($que,$temp);
        }
        return $que;
    }

    public function test($userId, $projectId, $categoryId) {
        $eachList = null;
        if ($categoryId) {
            $eachList = Category::find($categoryId)->
        }
    }

    public static function get_category_list($user_id, $project_id, $category_id = null) {

        $eachList = null;
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
        //*/
    }
}
