<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class NewCustomer extends Model
{
    //
    protected $table = "new_customer";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_name', 'phone', 'email','fb','duan','note','customer_resources_id','customer_resources', 'users_owner', 'address', 'profession', 'customer_status', 'gender',
        'users_add', 'tuong_tac'
    ];

    public function userAdd(){
        return $this->belongsTo(User::class,'users_add');
    }
}
