<?php

namespace App\Exports;

use App\Customer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CustomerExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return customer::all();
    }

    public function headings(): array
    {
        return [
          'ID',
          'customer_name',
          'phone',
          'email',
          'fb',
          'duan',
          'note',
          'users_owner',
          'customer_resources',
          'address','profession',
          'customer_status',
          'gender',
          'users_add',
          'tuong_tac',
          'Created_at',
          'updated_at'
        ];
    }





}
