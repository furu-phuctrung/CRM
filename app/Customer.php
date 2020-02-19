<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
   protected $table = 'customer';
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'ID', 'customer_name', 'phone','email','fb','duan','note','users_owner','customer_resources','customer_resource_id','address','profession','customer_status','Created_at','gender','users_add','tuong_tac','updated_at',
  ];



}
