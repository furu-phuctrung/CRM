<?php

namespace App\Http\Controllers\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\user;
use App\Customer;
use Validator;
use Hash;
use DB;

class CustomerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
     {
         $this->middleware(['auth', '2fa', 'isban']);
     }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


     public function customer($id)
     {

       $customer = DB::table('customer')->where('customer.id', $id)->get();
           foreach($customer as $customers)
           {
             $userid = $customers->users_owner;
             $customer_name = $customers->customer_name;
           }
           $userdepartmentid = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')->where('users.id', Auth::user()->id)->first();


           $customerdepartment = DB::table('department')->join('users', 'users.department_id', '=', 'department.id')->join('customer', 'customer.users_owner', '=', 'users.id')->where('customer.ID', $id)->orderBy('users.id', 'asc')
           ->first();
           $relationships = DB::table('relationships')->get();
           $user = DB::table('users')->get();
           $userdepartment = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')->where('department_id', $userdepartmentid->department_id)->select('users.username','users.id')->get();
           $country = DB::table('country')->get();
           $province = DB::table('province')->get();
           $district = DB::table('district')->get();
           $usersowner = DB::table('users')->where('id', $userid)->first();
           $customergroup = DB::table('customer_group')->select('name','id')->get();
           $customerresource = DB::table('customer_resource')->select('name','id')->get();


           if(Auth::user()->id == $userid || $userdepartmentid->department_id == $customerdepartment->department_id && Auth::user()->havePermission('Viewallcustomerdepartment') || Auth::user()->havePermission('ViewallCustomer') )
           {
                // sai Id customer
              $customer = DB::table('customer')->join('relationships', 'relationships.id', '=', 'customer.relationship_id')->where('customer.id', $id)
              ->get();


              $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.user_id')->where('customer_id', $id)->get();

              // dd($customer);
               $user_view = Auth::user()->username;
               $time = Carbon::now();
               $ip = \Request::ip();
               $datathaotac = " $user_view | Xem Chi tiết Khách Hàng | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $id ."'>". $id ."</a>";
               DB::table('logs')->insert([
                'nhanvien' => Auth::user()->username,
                'ip' => $ip,
                'thaotac' => $datathaotac,
                'thoigian' => $time,
                ]);

              return view('customer', compact('customergroup','customerresource','usersowner','country','province','district','userdepartment','customer','user','relationships','comments'));

           }

            $user_view = Auth::user()->username;
            $time = Carbon::now();
            $ip = \Request::ip();
            $datathaotac = " $user_view | Đang Cố Xem Khách Hàng Không Do Mình Phụ Trách | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $id ."'>". $id ."</a>";
            DB::table('logs')->insert([
             'nhanvien' => Auth::user()->username,
             'ip' => $ip,
             'thaotac' => $datathaotac,
             'thoigian' => $time,
             ]);
       return redirect()->route('home');
     }


     public function getaddnewcustomer()
     {
       $country = DB::table('country')->get();
       $province = DB::table('province')->get();
       $district = DB::table('district')->get();
       $relationships = DB::table('relationships')->get();
       $user = DB::table('users')->select('username','id')->get();
       $customergroup = DB::table('customer_group')->select('name','id')->get();
       $customerresource = DB::table('customer_resource')->select('name','id')->get();

       return view('addcustomer', compact('country','province','district','relationships','user','customergroup','customerresource'));
     }

     public function postaddnewcustomer(request $request)
     {
       $validator = $request->validate([
             'namekhachhang' => 'required|string|max:255',
             'emailkhachhang' => 'string|max:255|nullable',
             'phonekhachhang' => 'string|max:255|nullable',
             'addresskhachhang' => 'string|max:255|nullable',
             'nguoigioithieu' => 'string|max:255|nullable',
             'phonenguoigioithieu' => 'string|max:255|nullable',
             'emailnguoigioithieu' => 'string|max:255|nullable',
             'gioitinhnguoigioithieu' => 'string|max:255|nullable',
             'mota' => 'string|max:255|nullable',
             'hotennguoilienhe' => 'string|max:255|nullable',
             'emailnguoilienhe' => 'string|max:255|nullable',
             'phonenguoilienhe' => 'string|max:255|nullable',
             'ghichu' => 'max:255',
             'gioitinhnguoilienhe' => 'string|max:255|nullable',
             'namsinh' => 'string|max:255|nullable',
             'thanhpho' => 'string|max:255|nullable',
             'quanhuyen' => 'string|max:255|nullable',
             'quocgia' => 'string|max:255|nullable',
             'moiquanhe' => 'required|string|max:255',
             'nguoiphutrach' => 'required|string|max:255',
             'nhomkhachhang' => 'required|string|max:255',
             'nguonkhachhang' => 'required|string|max:255',
             'gioitinhkhachhang' => 'string|max:255|nullable',
             'linkfb' => 'string|max:255|nullable',
         ]);
         $code = 'KH-0'.str_random(15);

            $tennguonkhach = DB::table('customer_resource')->where('id', $request->nguonkhachhang)->first();
            $tennhomkhach = DB::table('customer_group')->where('id', $request->nhomkhachhang)->first();


        $customerid =  DB::table('customer')->insertGetId([
           'relationship_id' => $request->moiquanhe,
           'customer_name' => $request->namekhachhang,
           'phone' => $request->phonekhachhang,
           'address' => $request->addresskhachhang,
           'email' => $request->emailkhachhang,
           'fb' => $request->linkfb,
           'nguoigioithieu' => $request->nguoigioithieu,
           'phonenguoigioithieu' => $request->phonenguoigioithieu,
           'emailnguoigioithieu' => $request->emailnguoigioithieu,
           'gioitinhnguoigioithieu' => $request->gioitinhnguoigioithieu,
           'note' => $request->mota,
           'hotennguoilienhe' => $request->hotennguoilienhe,
           'emailnguoilienhe' => $request->emailnguoilienhe,
           'phonenguoilienhe' => $request->phonenguoilienhe,
           'ghichu' => $request->ghichu,
           'gioitinhnguoilienhe' => $request->gioitinhnguoilienhe,
           'sinhnhat' => $request->namsinh,
           'province_id' => $request->thanhpho,
           'district_id' => $request->quanhuyen,
           'country_id' => $request->quocgia,
           'users_owner' => $request->nguoiphutrach,
           'customer_group_id' => $request->nhomkhachhang,
           'customer_resources' => $tennguonkhach->name,
           'customer_resource_id' => $request->nguonkhachhang,
           'gender' => $request->gioitinhkhachhang,
           'code' => $code,
           ]);

           $user_view = Auth::user()->username;
           $time = Carbon::now();
           $ip = \Request::ip();
           $datathaotac = " $user_view | Thêm Khách Hàng Mới : | Khách Hàng  : <a href='https://crm.longdienland.com/customer/". $customerid ."'>". $request->namekhachhang ."</a>";
           DB::table('logs')->insert([
            'nhanvien' => Auth::user()->username,
            'ip' => $ip,
            'thaotac' => $datathaotac,
            'thoigian' => $time,
            ]);



        return redirect()->route('home');
     }

 public function postupdatecustomer(request $request)
 {

     $tennguonkhach = DB::table('customer_resource')->where('id', $request->nguonkhachhang)->first();
     $tennhomkhach = DB::table('customer_group')->where('id', $request->nhomkhachhang)->first();

      if($request->namekhachhang !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['customer_name'=>  $request->namekhachhang ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi Tên Khách hàng : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->emailkhachhang !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['email'=>  $request->emailkhachhang ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay email khách hàng : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->addresskhachhang !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['address'=>  $request->addresskhachhang ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi địa chỉ khách hàng : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->nguoigioithieu !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['nguoigioithieu'=>  $request->nguoigioithieu ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi Tên Người giới thiệu  : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->phonenguoigioithieu !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['phonenguoigioithieu'=>  $request->phonenguoigioithieu ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi số điện thoại người giới thiệu : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->emailnguoigioithieu !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['emailnguoigioithieu'=>  $request->emailnguoigioithieu ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi email người giời thiệu : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }

      if($request->gioitinhnguoigioithieu !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['gioitinhnguoigioithieu'=>  $request->gioitinhnguoigioithieu ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi giới tính người giới thiệu : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }

      if($request->hotennguoilienhe !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['hotennguoilienhe'=>  $request->hotennguoilienhe ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi Họ tên người liên hệ : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->emailnguoilienhe !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['emailnguoilienhe'=>  $request->emailnguoilienhe ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi email người liên hệ : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->phonenguoilienhe !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['phonenguoilienhe'=>  $request->phonenguoilienhe ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi số điện thoại người liên hệ : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->gioitinhnguoilienhe !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['gioitinhnguoilienhe'=>  $request->gioitinhnguoilienhe ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi giới tính người liên hệ : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }

      if($request->namsinh !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['sinhnhat'=>  $request->namsinh ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi Năm sinh : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->thanhpho !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['province_id'=>  $request->thanhpho ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi Thành Phố : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->quanhuyen !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['district_id'=>  $request->quanhuyen ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi Quận huyện : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }
      if($request->quocgia !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['country_id'=>  $request->quocgia ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi Quốc Gia : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);

      }

      if($request->nguoiphutrach !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['users_owner'=>  $request->nguoiphutrach ]);

        $nguoiphutrach = DB::table('customer')->where('ID', $request->customer_id)->select('users_owner')->first();

        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thay đổi người phụ Trách  : ". $nguoiphutrach->users_owner ." Cho : ". $request->nguoiphutrach ."  | Khách Hàng  : <a href='https://crm.longdienland.com/customer/". $request->customer_id ."'>". $request->customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
      }

      if($request->moiquanhe !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['relationship_id'=> $request->moiquanhe ]);

      }

      if($request->nhomkhachhang !== null)
      {

        DB::table('customer')->where('ID', $request->customer_id)->update(['customer_group_id'=> $request->nhomkhachhang ]);

      }

      if($request->gioitinhkhachhang !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['gender'=> $request->gioitinhkhachhang ]);

      }

      if($request->fb !== null)
      {
        DB::table('customer')->where('ID', $request->customer_id)->update(['fb'=> $request->fb ]);

      }
    return redirect()->route('home');
 }
public function addcomment(request $request)
  {
    $validator = $request->validate([
          'customer_id' => 'required|string|max:255',
          'comment' => 'required|string|max:255',
      ]);
        $user_id = Auth::user()->id;
        $time = Carbon::now();
        $customer_id = $request->customer_id;
        $id = DB::table('comments')->insertGetId([
        'user_id' => $user_id,
        'customer_id' => $customer_id,
        'comment' => $request->comment,
        'created_at' => $time,
        'updated_at' => $time,
        ]);
        $user_view = Auth::user()->username;
        $time = Carbon::now();
        $ip = \Request::ip();
        $datathaotac = " $user_view | Thêm Thông Tin Trao Đổi Khách Hàng : $request->comment | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $customer_id ."'>". $customer_id ."</a>";
        DB::table('logs')->insert([
         'nhanvien' => Auth::user()->username,
         'ip' => $ip,
         'thaotac' => $datathaotac,
         'thoigian' => $time,
         ]);
        return redirect()->back();
  }


public function viewstatus($id)
  {
         $datas = DB::table('customer')
         ->join('customer_group','customer_group.id', '=', 'customer.customer_group_id')
         ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
         ->where('customer.relationship_id', $id)
         ->where('customer.users_owner', Auth::user()->id)
         ->orderBy('customer.ID', 'desc')
         ->paginate(20);

         $customer_group = DB::table('customer_group')->get();
         $users = DB::table('users')->get();
         $relation = DB::table('relationships')->get();
         return view('home', compact('datas','customer_group','users','relation'));
  }

public function viewstatusdepartment($id)
{
  $userdepartmentid = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')->where('users.id', Auth::user()->id)->first();
  $userdepartment = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')->where('department_id', $userdepartmentid->department_id)->select('users.id','users.username')->get();
  $customer_group = DB::table('customer_group')->get();
  $relation = DB::table('relationships')->get();

  if(Auth::user()->havePermission('Viewallcustomerdepartment'))
  {
    $datas = DB::table('department')
    ->join('users', 'users.department_id', '=', 'department.id')
    ->join('customer', 'customer.users_owner', '=', 'users.id')
    ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
    ->where('department.id', $userdepartmentid->department_id)
    ->where('customer.relationship_id', $id)
    ->orderBy('relationship_id', 'asc')
    ->paginate(20);

    $datas->appends(request()->all())->links();
    return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));
  }
}

public function viewstatusmanager($id)
{
    $relation = DB::table('relationships')->get();
    $customer_group = DB::table('customer_group')->get();
    $users = DB::table('users')->get();
    if(Auth::user()->havePermission('ViewallCustomer'))
    {
      $datas = DB::table('department')
      ->join('users', 'users.department_id', '=', 'department.id')
      ->join('customer', 'customer.users_owner', '=', 'users.id')
      ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
      ->where('customer.relationship_id', $id)
      ->orderBy('relationship_id', 'asc')
      ->paginate(50);
      $datas->appends(request()->all())->links();
      return view('customermanager', compact('datas','customer_group','users','relation'));
    }
}


  public function postMota(Request $rq){
    $customer = DB::table('customer')->where('ID',$rq->id ?? null)->select('ID')->first();
    if($customer){
      //update
      $motaold = DB::table('customer')->where('ID',$customer->ID)->first();
      $result = DB::table('customer')->where('ID',$customer->ID)->update(['note' => $rq->note]);
       $user_view = Auth::user()->username;
       $time = Carbon::now();
       $ip = \Request::ip();
       $datathaotac = " $user_view | Thay Đổi Mô Tả : $motaold->note - Thành : $rq->note | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $customer->ID ."'>". $customer->ID ."</a>";
       DB::table('logs')->insert([
        'nhanvien' => Auth::user()->username,
        'ip' => $ip,
        'thaotac' => $datathaotac,
        'thoigian' => $time,
        ]);

      return json_encode([
        'isSuccess' => true,
        'message'  => 'Lưu thành công'
      ]);

    }else{
      return json_encode([
        'isSuccess' => false,
        'message'  => 'Không thể lưu'
      ]);
    }
  }


  public function postchangeusersowner(Request $request)
  {
      try{
          $listCustomer = Customer::whereIn('id',$request->listcustomerchange)->get();
          $userchange = User::find($request->userchange);
          if($userchange){
              $count = 0;
              foreach($listCustomer as $newCus){
                      $id = DB::table('customer')->where('ID', $newCus->ID)->update([
                        'users_owner'=>  $userchange->id,
                      ]);
                      $user_view = Auth::user()->username;
                      $time = Carbon::now();
                      $ip = \Request::ip();
                      $datathaotac = " $user_view | chuyễn khách hàng : | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $newCus->ID ."'>". $newCus->ID ."</a> - Cho : $userchange->username ";
                      DB::table('logs')->insert([
                       'nhanvien' => Auth::user()->username,
                       'ip' => $ip,
                       'thaotac' => $datathaotac,
                       'thoigian' => $time,
                       ]);
                       $count++;
                     }
              return json_encode(["isSuccess"=>true,"message"=> "Chuyễn thành công " . $count . ' khách hàng cho ' . $userchange->username]);
          }else{
              return json_encode(["isSuccess"=>true,"message"=>"Không tìm thấy nhân viên"]);
          }
      }catch(Exception $e){
          return json_encode(["isSuccess"=>false,"message"=>"Chia sẻ thất bại"]);
      }

  }

  public function searchcustomer(request $request)
  {

    $validator = $request->validate([
          'nhomkhachhang' => 'string|max:255|nullable',
          'nguoiphutrach' => 'string|max:255|nullable',
          'generalSearch' => 'string|max:255|nullable',
      ]);
      $customer_group = DB::table('customer_group')->get();
      $users = DB::table('users')->get();
      $relation = DB::table('relationships')->get();

      if($request->nhomkhachhang !== null && $request->generalSearch == null)
      {

        $datas = DB::table('customer')->join('relationships','relationships.id', '=' , 'customer.relationship_id')->where('users_owner', Auth::user()->id)->where('customer_group_id', $request->nhomkhachhang)->orderBy('customer.ID', 'desc')
        ->paginate(50);
        $datas->appends(request()->all())->links();
        return view('home', compact('datas','customer_group','users','relation'));

      }elseif($request->nhomkhachhang !== null && $request->generalSearch !== null)
      {

        $datas = DB::table('customer')->join('relationships','relationships.id', '=' , 'customer.relationship_id')->where('users_owner', Auth::user()->id)->where('customer_group_id', $request->nhomkhachhang)->where('phone','like','%'.$request->generalSearch.'%')->orderBy('customer.ID', 'desc')
        ->paginate(50);
        $datas->appends(request()->all())->links();
        return view('home', compact('datas','customer_group','users','relation'));

      }
      elseif($request->nhomkhachhang == null && $request->generalSearch !== null)
      {
        $datas = DB::table('customer')->join('relationships','relationships.id', '=' , 'customer.relationship_id')->where('users_owner', Auth::user()->id)->where('phone', 'like','%'.$request->generalSearch.'%')->orderBy('customer.ID', 'desc')
        ->paginate(50);
        $datas->appends(request()->all())->links();
        return view('home', compact('datas','customer_group','users','relation'));

      }else{
        return redirect()->route('home');

      }


  }

  public function searchcustomerdepartment(request $request)
  {

    $validator = $request->validate([
          'nhomkhachhang' => 'string|max:255|nullable',
          'nguoiphutrach' => 'string|max:255|nullable',
          'generalSearch' => 'string|max:255|nullable',
      ]);


      if(Auth::user()->havePermission('Viewallcustomerdepartment'))
      {
        $userdepartmentid = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')->where('users.id', Auth::user()->id)->first();
        $userdepartment = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')->where('department_id', $userdepartmentid->department_id)->select('users.id','users.username')->get();
        $relation = DB::table('relationships')->get();
        $customer_group = DB::table('customer_group')->get();

      if($request->nhomkhachhang !== null && $request->nguoiphutrach == null && $request->generalSearch == null)
      {
        $datas = DB::table('department')
        ->join('users', 'users.department_id', '=', 'department.id')
        ->join('customer', 'customer.users_owner', '=', 'users.id')
        ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
        ->where('department.id', $userdepartmentid->department_id)
        ->where('customer_group_id', $request->nhomkhachhang)
        ->orderBy('customer.ID', 'desc')
        ->paginate(50);

        $datas->appends(request()->all())->links();
        return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));

      }
      elseif($request->nhomkhachhang == null && $request->nguoiphutrach !== null && $request->generalSearch == null)
      {

        $datas = DB::table('department')
        ->join('users', 'users.department_id', '=', 'department.id')
        ->join('customer', 'customer.users_owner', '=', 'users.id')
        ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
        ->where('department.id', $userdepartmentid->department_id)
        ->where('customer.users_owner', $request->nguoiphutrach)
        ->orderBy('customer.ID', 'desc')
        ->paginate(50);


        // dd($request->nguoiphutrach);

        $datas->appends(request()->all())->links();


        return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));

      }
      elseif($request->nhomkhachhang == null && $request->nguoiphutrach == null && $request->generalSearch !== null)
      {

        $datas = DB::table('department')
        ->join('users', 'users.department_id', '=', 'department.id')
        ->join('customer', 'customer.users_owner', '=', 'users.id')
        ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
        ->where('department.id', $userdepartmentid->department_id)
        ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
        ->orderBy('customer.ID', 'desc')
        ->paginate(20);
        $datas->appends(request()->all())->links();
        return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));

      }
      elseif($request->nhomkhachhang !== null && $request->nguoiphutrach !== null && $request->generalSearch == null)
      {

        $datas = DB::table('department')
        ->join('users', 'users.department_id', '=', 'department.id')
        ->join('customer', 'customer.users_owner', '=', 'users.id')
        ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
        ->where('department.id', $userdepartmentid->department_id)
        ->where('customer_group_id', $request->nhomkhachhang)
        ->where('users_owner', $request->nguoiphutrach)
        ->orderBy('customer.ID', 'desc')
        ->paginate(20);

        $datas->appends(request()->all())->links();
        return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));

      }
      elseif($request->nhomkhachhang !== null && $request->nguoiphutrach == null && $request->generalSearch !== null)
      {

        $datas = DB::table('department')
        ->join('users', 'users.department_id', '=', 'department.id')
        ->join('customer', 'customer.users_owner', '=', 'users.id')
        ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
        ->where('department.id', $userdepartmentid->department_id)
        ->where('customer_group_id', $request->nhomkhachhang)
        ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
        ->orderBy('customer.ID', 'desc')
        ->paginate(20);

        $datas->appends(request()->all())->links();
        return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));

      }
      elseif($request->nhomkhachhang == null && $request->nguoiphutrach !== null && $request->generalSearch !== null)
      {

        $datas = DB::table('department')
        ->join('users', 'users.department_id', '=', 'department.id')
        ->join('customer', 'customer.users_owner', '=', 'users.id')
        ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
        ->where('department.id', $userdepartmentid->department_id)
        ->where('users_owner', $request->nguoiphutrach)
        ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
        ->orderBy('customer.ID', 'desc')
        ->paginate(20);

        $datas->appends(request()->all())->links();
        return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));

      }
      elseif($request->nhomkhachhang !== null && $request->nguoiphutrach !== null && $request->generalSearch !== null)
      {
        $datas = DB::table('department')
        ->join('users', 'users.department_id', '=', 'department.id')
        ->join('customer', 'customer.users_owner', '=', 'users.id')
        ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
        ->where('department.id', $userdepartmentid->department_id)
        ->where('customer_group_id', $request->nhomkhachhang)
        ->where('users_owner', $request->nguoiphutrach)
        ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
        ->orderBy('customer.ID', 'desc')
        ->paginate(20);
        $datas->appends(request()->all())->links();
        return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));

      }


    }
  }
  public function searchcustomermanager(request $request)
  {

    $validator = $request->validate([
          'nhomkhachhang' => 'string|max:255|nullable',
          'nguoiphutrach' => 'string|max:255|nullable',
          'generalSearch' => 'string|max:255|nullable',
      ]);

      if(Auth::user()->havePermission('ViewallCustomer'))
      {
        $customer_group = DB::table('customer_group')->get();
        $users = DB::table('users')->get();
        $relation = DB::table('relationships')->get();

        if($request->nhomkhachhang !== null && $request->nguoiphutrach == null && $request->generalSearch == null)
        {
          $datas = DB::table('department')
          ->join('users', 'users.department_id', '=', 'department.id')
          ->join('customer', 'customer.users_owner', '=', 'users.id')
          ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
          ->where('customer_group_id', $request->nhomkhachhang)
          ->orderBy('customer.ID', 'desc')
          ->paginate(50);
          $datas->appends(request()->all())->links();
          return view('customermanager', compact('datas','customer_group','users','relation'));

        }
        elseif($request->nhomkhachhang == null && $request->nguoiphutrach !== null && $request->generalSearch == null)
        {

          $datas = DB::table('department')
          ->join('users', 'users.department_id', '=', 'department.id')
          ->join('customer', 'customer.users_owner', '=', 'users.id')
          ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
          ->where('users_owner', $request->nguoiphutrach)
          ->orderBy('customer.ID', 'desc')
          ->paginate(50);
          $datas->appends(request()->all())->links();
          return view('customermanager', compact('datas','customer_group','users','relation'));

        }
        elseif($request->nhomkhachhang == null && $request->nguoiphutrach == null && $request->generalSearch !== null)
        {

          $datas = DB::table('department')
          ->join('users', 'users.department_id', '=', 'department.id')
          ->join('customer', 'customer.users_owner', '=', 'users.id')
          ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
          ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
          ->orderBy('customer.ID', 'desc')
          ->paginate(50);
          $datas->appends(request()->all())->links();
          return view('customermanager', compact('datas','customer_group','users','relation'));

        }
        elseif($request->nhomkhachhang !== null && $request->nguoiphutrach !== null && $request->generalSearch == null)
        {

          $datas = DB::table('department')
          ->join('users', 'users.department_id', '=', 'department.id')
          ->join('customer', 'customer.users_owner', '=', 'users.id')
          ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
          ->where('customer_group_id', $request->nhomkhachhang)
          ->where('users_owner', $request->nguoiphutrach)
          ->orderBy('customer.ID', 'desc')
          ->paginate(50);
          $datas->appends(request()->all())->links();
          return view('customermanager', compact('datas','customer_group','users','relation'));

        }
        elseif($request->nhomkhachhang !== null && $request->nguoiphutrach == null && $request->generalSearch !== null)
        {

          $datas = DB::table('department')
          ->join('users', 'users.department_id', '=', 'department.id')
          ->join('customer', 'customer.users_owner', '=', 'users.id')
          ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
          ->where('customer_group_id', $request->nhomkhachhang)
          ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
          ->orderBy('customer.ID', 'desc')
          ->paginate(50);
          $datas->appends(request()->all())->links();
          return view('customermanager', compact('datas','customer_group','users','relation'));

        }
        elseif($request->nhomkhachhang == null && $request->nguoiphutrach !== null && $request->generalSearch !== null)
        {

          $datas = DB::table('department')
          ->join('users', 'users.department_id', '=', 'department.id')
          ->join('customer', 'customer.users_owner', '=', 'users.id')
          ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
          ->where('users_owner', $request->nguoiphutrach)
          ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
          ->orderBy('customer.ID', 'desc')
          ->paginate(50);
          $datas->appends(request()->all())->links();
          return view('customermanager', compact('datas','customer_group','users','relation'));

        }
        elseif($request->nhomkhachhang !== null && $request->nguoiphutrach !== null && $request->generalSearch !== null)
        {
          $datas = DB::table('department')
          ->join('users', 'users.department_id', '=', 'department.id')
          ->join('customer', 'customer.users_owner', '=', 'users.id')
          ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
          ->where('customer_group_id', $request->nhomkhachhang)
          ->where('users_owner', $request->nguoiphutrach)
          ->where('customer.phone', 'like','%'.$request->generalSearch.'%')
          ->orderBy('customer.ID', 'desc')
          ->paginate(50);
          $datas->appends(request()->all())->links();
          return view('customermanager', compact('datas','customer_group','users','relation'));

        }
      }
    }

public function change_relation(request $request)
{
  $relationshipold = DB::table('customer')->join('relationships','relationships.id', '=' , 'customer.relationship_id')->where('customer.ID', $request->customerid)->first();
  $relation = DB::table('relationships')->where('id', $request->moiquanhe)->first();
  DB::table('customer')->where('ID', $request->customerid)->update(['relationship_id'=>  $request->moiquanhe ]);
  $user_view = Auth::user()->username;
  $time = Carbon::now();
  $ip = \Request::ip();
  $datathaotac = " $user_view | Thay Đổi Trạng Thái Khách Hàng ". $relationshipold->name ." Thành ". $relation->name ." | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $request->customerid ."'>". $request->customerid ."</a>";
  DB::table('logs')->insert([
   'nhanvien' => Auth::user()->username,
   'ip' => $ip,
   'thaotac' => $datathaotac,
   'thoigian' => $time,
   ]);
   return response()->json($relation);
}





}
