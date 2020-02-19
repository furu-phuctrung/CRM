<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\PermissionGroupJunction;

class PermissionGroup extends Model
{
    //
    protected $table = "permission_group";

    public function permissionGroupJunction(){
        return $this->hasMany(PermissionGroupJunction::class, 'group_id')->with(['permission']);
    }

    public function permissions() {
        return $this->belongsToMany(Permission::class, 'permission_group_junction', 'group_id', 'permission_id');
    }

    public function getPermissionCode(){
        $listPermission = [];
        foreach($this->permissions as $permission){
            $listPermission[] = $permission->code;
        }
        return $listPermission;
    }

    public function children(){
        return $this->hasMany(PermissionGroup::class, 'parent_id')->with('children')->where('is_active',1);
    }

    public static function allGroup(){
        return static::where('is_active',1)->get();
    }

    //order group ============
    public static function orderGroupByParent($allGroup){
        return static::groupByParent($allGroup, [], null, 0);
    }

    public static function groupByParent($allGroup, $currentGroup, $parent_id, $level){
        foreach($allGroup as $g){
            if($g->parent_id == $parent_id){
                $g->{"level"} = $level; //add property
                $currentGroup[] = $g;
                $currentGroup = static::groupByParent($allGroup, $currentGroup, $g->id, $level + 1);
            }
        }
        return $currentGroup;
    }

    public function levelMark($mark, $level){
        $strMark = '';
        for($i = 0; $i < $level; $i++){
            $strMark .= $mark;
        }
        return $strMark;
    }
    //end order group
}
