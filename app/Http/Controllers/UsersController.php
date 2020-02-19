<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\users;
use Validator;
use Hash;
use DB;

class UsersController extends Controller
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


     public function settingprofile()
     {

       $user = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')
       ->join('position', 'position.id', '=', 'users.position_id')
       ->select('updated_at','email','users.id as iduser','users.username as fullname','phone','position.name as position_name','department.name as department_name')
       ->where('users.id', Auth::user()->id)->get();

       return view('profile',compact('user'));
     }

     public function changeprofile(request $request)
     {
       $validator = Validator::make($request->all(), [
         'name' => 'string|max:255|nullable',
         'email' => 'string|max:255|unique:users,email|nullable',
         'phone' => 'string|max:255|nullable',
         ]);
         if ($validator->fails()) {
            return redirect()->route('profile')
                        ->withErrors($validator)
                        ->withInput();
        }

        if ($request->name !== null)
        {
           DB::table('users')->where('id', Auth::user()->id)->update([
             'username'=>  $request->name,
           ]);
        }
        if ($request->email !== null)
        {
           DB::table('users')->where('id', Auth::user()->id)->update([
             'email'=>  $request->email,
           ]);
         }
         if ($request->phone !== null)
         {
           DB::table('users')->where('id', Auth::user()->id)->update([
             'phone'=>  $request->phone,
           ]);
         }

       return redirect()->route('profile')->with('success', 'Đổi Thông Tin Cá Nhân Thành Công');
     }

     public function changepass(request $request)
     {
       $validator = $request->validate([
           'password' => 'string|min:8|confirmed',
         ]);

         DB::table('users')->where('id', Auth::user()->id)->update(['password'=>  Hash::make($request->password)]);

       return redirect()->route('profile')->with('success', " Đổi Mật Khẩu Thành Công , Mật Khẩu Của Bạn Là : ". $request->password . "");
     }







}
