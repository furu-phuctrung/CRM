<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionUserGroupJunction extends Model
{
    //
    protected $table = "permission_user_group_junction";

    public function group(){
        return $this->belongsTo(\App\Models\PermissionGroup::class, 'group_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
