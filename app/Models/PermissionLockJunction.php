<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PermissionLockJunction extends Model
{
    //
    protected $table = "permission_lock_junction";

    public function permission(){
        return $this->belongsTo(\App\Models\Permission::class, 'permission_id');
    }

    public function user(){
        return $this->belongsTo(\App\User::class, 'user_id');
    }
}
