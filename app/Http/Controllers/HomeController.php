<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use App\users;
use Validator;
use Hash;
use Carbon\Carbon;
class HomeController extends Controller
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

public function geticon()
{
   return view('icon');
}

// start post update mqh select

public function customer()
{
    $datas = DB::table('customer')
    ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
    ->where('users_owner', Auth::user()->id)->orderBy('customer.ID', 'Desc')
    ->paginate(20);
    $relation = DB::table('relationships')->get();
    $customer_group = DB::table('customer_group')->get();
    $users = DB::table('users')->get();
  return view('home', compact('datas','customer_group','users','relation'));
}
public function customerdepartment()
{
    if(Auth::user()->havePermission('Viewallcustomerdepartment'))
    {
      $relation = DB::table('relationships')->get();
      $userdepartmentid = DB::table('users')
      ->join('department', 'department.id', '=', 'users.department_id')
      ->where('users.id', Auth::user()->id)->first();

      $userdepartment = DB::table('users')
      ->join('department', 'department.id', '=', 'users.department_id')
      ->where('department_id', $userdepartmentid->department_id)
      ->select('users.id','users.username')->get();

      $datas = DB::table('department')
      ->join('users', 'users.department_id', '=', 'department.id')
      ->join('customer', 'customer.users_owner', '=', 'users.id')
      ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
      ->where('department.id', $userdepartmentid->department_id)
      ->orderBy('customer.ID', 'desc')
      ->paginate(20);

      $customer_group = DB::table('customer_group')->get();
      return view('customerdepartment', compact('datas','customer_group','userdepartment','relation'));
    }
    return redirect()->route('home');
}
public function customerall()
{
    if(Auth::user()->havePermission('ViewallCustomer'))
    {
      $relation = DB::table('relationships')->get();
      $datas = DB::table('department')
      ->join('users', 'users.department_id', '=', 'department.id')
      ->join('customer', 'customer.users_owner', '=', 'users.id')
      ->join('relationships','relationships.id', '=' , 'customer.relationship_id')
      ->orderBy('customer.ID', 'desc')
      ->paginate(20);
      $customer_group = DB::table('customer_group')->get();
      $users = DB::table('users')->get();
      return view('customermanager', compact('datas','customer_group','users','relation'));
    }
  return redirect()->route('home');
}

//end get post update mqh select





public function getcomment(request $request)
{
  if($request->ajax())
  {
    $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.user_id')->where('customer_id', $request->RecordID)->orderBy('customer_id', 'DESC')->get();
  }
  return response()->json($comments);
}
public function postcomment(request $request)
{
  if($request->ajax())
  {
    $validator = $request->validate([
          'id' => 'required',
          'comment' => 'required|max:255',
      ]);
      $user_view = Auth::user()->username;
      $time = Carbon::now();
      $ip = \Request::ip();
      $user_id = Auth::user()->id;
      $customer_id = $request->id;
      $comment = $request->comment;
      $datathaotac = " $user_view | Thêm Thông Tin Trao Đổi Vs Khách hàng : ".$comment." | Khách Hàng ID : <a href='https://crm.longdienland.com/customer/". $customer_id ."'>". $customer_id ."</a>";
      DB::table('logs')->insert([
       'nhanvien' => Auth::user()->username,
       'ip' => $ip,
       'thaotac' => $datathaotac,
       'thoigian' => $time,
       ]);
       $id = DB::table('comments')->insertGetId([
       'user_id' => $user_id,
       'customer_id' => $customer_id,
       'comment' => $comment,
       'created_at' => $time,
       'updated_at' => $time,
       ]);
       $comments = DB::table('comments')->join('users', 'users.id', '=', 'comments.user_id')->where('customer_id', $customer_id)->orderBy('customer_id', 'desc')->get();
  }
  return response()->json($comments);
}



}
