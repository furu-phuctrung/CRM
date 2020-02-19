<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Customer;

class CustomerGroup extends Model
{
    protected $table = 'customer_group';

    public function customers() {
        return $this->belongsToMany(Customer::class, 'customer_group_junction', 'customer_group_id', 'customer_id');
    }
}
