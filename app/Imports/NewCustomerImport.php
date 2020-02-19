<?php

namespace App\Imports;
use App\Customer;
use App\Models\NewCustomer;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use DB;
use Carbon\Carbon;
class NewCustomerImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row) {


        // do something
        if(substr($row['dien_thoai'], 0, 1))
        {
          $row['dien_thoai'] = "0".$row['dien_thoai']."";
        }
        $countPhone = NewCustomer::where('phone', $row['phone'] ?? $row['dien_thoai'])->count();
        if($countPhone > 0){
          $time = Carbon::now();
          $customerold = NewCustomer::where('phone', $row['phone'] ?? $row['dien_thoai'])->first();
          $data= " Khách hàng vừa thêm : ".$row['ten_khach_hang']." Số Điện Thoại ".$row['dien_thoai']." Trùng với | Khách Hàng ".$customerold->customer_name." Số Điện Thoại ".$customerold->phone."";
            DB::table('customererror')->insert([
       				'customer_name' => $row['customer_name'] ?? $row['ten_khach_hang'] ?? '',
       				'phone' => $row['phone'] ?? $row['dien_thoai'] ?? '',
       				'error_status' => $data,
              'created_at' => $time,
       			]);
            return null;
        }
        $countPhone = Customer::where('phone', $row['phone'] ?? $row['dien_thoai'])->count();
        if($countPhone > 0){
          $time = Carbon::now();
          $customerold = Customer::where('phone', $row['phone'] ?? $row['dien_thoai'])->first();
          $data= " Khách hàng vừa thêm : ".$row['ten_khach_hang']." Số Điện Thoại ".$row['dien_thoai']." Trùng với Khách Hàng : <a href='https://crm.longdienland.com/customer/". $customerold->ID ."'>". $customerold->customer_name ."</a>";
            DB::table('customererror')->insert([
       				'customer_name' => $row['customer_name'] ?? $row['ten_khach_hang'] ?? '',
       				'phone' => $row['phone'] ?? $row['dien_thoai'] ?? '',
       				'error_status' => $data,
              'created_at' => $time,
       			]);
          return null;
        }
        $customerrsid = DB::table('customer_resource')->where('name', $row['customer_resources'] ?? $row['nguon_khach_hang'] ?? '')->first();
        if($customerrsid == null){
          $time = Carbon::now();
          $customerold = Customer::where('phone', $row['phone'] ?? $row['dien_thoai'])->first();
          $data= " Khách hàng vừa thêm : ".$row['ten_khach_hang']." Số Điện Thoại ".$row['dien_thoai']." Không Có Nguồn Khách Hàng Hoặc Không Khớp Dữ liệu";
            DB::table('customererror')->insert([
       				'customer_name' => $row['customer_name'] ?? $row['ten_khach_hang'] ?? '',
       				'phone' => $row['phone'] ?? $row['dien_thoai'] ?? '',
       				'error_status' => $data,
              'created_at' => $time,
       			]);
          return null;
        }


        if($row['customer_name'] ?? $row['ten_khach_hang'] ?? false){

            return new NewCustomer([
                'customer_name' => $row['customer_name'] ?? $row['ten_khach_hang'] ?? '',
                'phone' => $row['phone'] ?? $row['dien_thoai'] ?? '',
                'email' => $row['email'] ?? $row['email'] ?? '',
                'fb' => $row['fb'] ?? $row['link_facebook'] ?? '',
                'duan' => $row['duan'] ?? $row['nhom_khach_hang'] ?? '',
                'note' => $row['note'] ?? $row['mo_ta'] ?? '',
                'customer_resources_id' => $customerrsid->id,
                'customer_resources' => $row['customer_resources'] ?? $row['nguon_khach_hang'] ?? '',
                'users_owner' => '',
                'address' => '',
                'profession' => '',
                'customer_status' => 0,
                'gender' => '',
                'users_add' => auth()->user()->id ?? null,
                'tuong_tac' => ''
            ]);
        }else{
            return null;
        }

    }
}
