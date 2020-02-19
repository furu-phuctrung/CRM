<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionGroupJunction extends Model
{
    //
    protected $table = "permission_group_junction";

    public function group(){
        return $this->belongsTo(\App\Models\PermissionGroup::class, 'group_id');
    }

    public function permission(){
        return $this->belongsTo(\App\Models\Permission::class, 'permission_id');
    }
}
