<?php

namespace App\Imports;

use App\Customer;
use App\User;
use App\Models\CustomerGroup;
use App\Models\CustomerResource;
use App\Models\Relationship;
use App\Models\Country;
use App\Models\Province;
use App\models\District;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\SkipsOnError;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Validator;
use DB;
class CustomerImport implements ToModel, WithHeadingRow
{

  /**
  * @param array $row
  *
  * @return \Illuminate\Database\Eloquent\Model|null
  */
  public function model(array $row) {
    if(!$row['ten_khach_hang']){
      return null;
    }
    //check phone exist
    $countPhone = Customer::where('phone', $row['dien_thoai'])->count();
    if($countPhone > 0){
      return null;
    }

    //create customer
    $customer = new Customer();
    $customer->customer_name = $row['ten_khach_hang'] ?? '';
    $customer->phone = $row['dien_thoai'] ?? '';
    $customer->email = $row['email'] ?? '';
    $customer->note = $row['mo_ta'] ?? '';

    //find owner
    if($row['nguoi_phu_trach']){
      $user_owner = User::where('username', $row['nguoi_phu_trach'])->first();
      $customer->users_owner = $user_owner ? $user_owner->id : '';
    }
    $customer->fb = $row['link_facebook'] ?? '';


    //customer resource name
    if($row['nguon_khach_hang']){
      $customer->customer_resources =  $row['nguon_khach_hang'] ?? '';
    }

    //find customer resource id
    if($row['nguon_khach_hang']){
      $customerResouce = CustomerResource::where('name', $row['nguon_khach_hang'])->first();
      $customer->customer_resource_id =  $customerResouce ? $customerResouce->id : '';
    }
    $customer->duan = $row['duan'] ?? $row['nhom_khach_hang'] ?? '';

    $customer->created_at = date("Y-m-d H:i:s", strtotime($row['ngay_tao']));


    $customer->address = $row['dia_chi'] ?? '';
    $customer->code = $row['ma_kh'] ?? '';
    $customer->sinhnhat = date("Y-m-d", strtotime($row['sinh_nhat']));



    if($row['moi_quan_he']){
      $relationship = Relationship::where('name',$row['moi_quan_he'])->first();
      $customer->relationship_id = $relationship ? $relationship->id : $relationship;
    }
    // if($row['quoc_gia']){
    //   $country = Country::where('name',$row['quoc_gia'])->first();
    //   $customer->country_id = $country ? $country->id : $country;
    // }
    // if($row['tinhthanh_pho']){
    //   $province = Province::where('name',$row['tinhthanh_pho'])->first();
    //   $customer->province_id = $province ? $province->id : $province;
    // }
    // if($row['quanhuyen']){
    //   $district = District::where('name',$row['quanhuyen'])->first();
    //   $customer->district_id = $district ? $district->id : $district;
    // }
    $customer->gender = $row['gioi_tinh'] ?? '';
    $customer->users_add = $row['nguoi_tao'] ?? '';
    $customer->users_owner = Auth::user()->id;
    $customer->tuong_tac = $row['tong_so_tuong_tac'] ?? '';

    if($row['nhom_khach_hang']){
      $customerGroup = CustomerGroup::where('name', $row['nhom_khach_hang'])->first();
      $customer->customer_group_id = $customerGroup ? $customerGroup->id : $customerGroup;
    }
    $customer->save();

    if($row['mo_ta'] !== '')
    {
        $user_id = Auth::user()->id;
        $time = Carbon::now();
        $id = DB::table('comments')->insertGetId([
        'user_id' => $user_id,
        'customer_id' => $customer->id,
        'comment' => $customer->note,
        'created_at' => $time,
        'updated_at' => $time,
        ]);
    }


  }
}
