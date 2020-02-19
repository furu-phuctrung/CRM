<?php

namespace App\Http\Controllers\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Models\PermissionGroup;
use App\Models\Permission;
use App\users;
use Validator;
use DB;

class SettingUserController extends Controller
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
     public function settinglistusers()
     {

       $user = DB::table('users')->join('department', 'department.id', '=', 'users.department_id')
       ->join('position', 'position.id', '=', 'users.position_id')
       ->select('updated_at','email','users.id as iduser','users.username as fullname','phone','position.name as position_name','department.name as department_name')
       ->where('is_banned', 0)->orderBy('users.id', 'asc')->get();


       $department = DB::table('department')->get();
       $position = DB::table('position')->get();
       $userbanned = DB::table('users')->where('is_banned', 1)->get();
       return view('listusers', compact(['user','userbanned','position','department']));
     }

     public function settingadduser()
     {
       $department = DB::table('department')->get();
       $position = DB::table('position')->get();
       $items = PermissionGroup::allGroup();
       $items = PermissionGroup::orderGroupByParent($items);
       return view('adduser' , compact(['position','department','items']));
     }

     public function adduser(request $request)
     {
       $validator = $request->validate([
           'name' => 'required|string|max:255',
           'department' => 'required|string|max:255',
           'position' => 'required|string|max:255',
           'email' => 'max:255|unique:users,email',
           'phone' => 'string|max:255|nullable',
           'password' => 'required|string|min:8|confirmed',
         ]);

        $usersid = DB::table('users')->insertGetId([
   				'department_id' => $request->department ,
          'position_id' => $request->position ,
   				'username' => $request->name,
   				'email' => $request->email,
   				'phone' => $request->phone,
          'password' => Hash::make($request->password),
   			]);
         return redirect()->route('settingusers')->with('success', "Thêm Người dùng Thành Công");
     }

     public function editusers($id)
     {
      $user = DB::table('users')
           ->where('id', $id)
           ->first();
      $permission_user_group = DB::table('permission_user_group_junction')
                ->where('user_id', $id)
                ->first();

       $departmentuser = DB::table('department')->where('id', $id)->get();
       $positionuser = DB::table('position')->where('id', $id)->get();
       $department = DB::table('department')->get();
       $position = DB::table('position')->get();

       $items = PermissionGroup::allGroup();
       $items = PermissionGroup::orderGroupByParent($items);

       return view('edituser', compact(['user','positionuser','departmentuser','position','department','items']));

     }

     public function postedituser(request $request)
     {

       // if($request->moiquanhe !== null)
       // {
       //   DB::table('customer')->where('ID', $request->customer_id)->update(['relationship_id'=>  $request->moiquanhe ]);
       //
       // }



     }



     public function banuser($id)
     {
       DB::table('users')
           ->where('id', $id)
           ->update(['is_banned' => 1]);

       return redirect()->route('settingusers')->with('success', "Khoá Quyền Sử dụng Người dùng Thành Công");
     }

     public function activeuser($id)
     {
       DB::table('users')
           ->where('id', $id)
           ->update(['is_banned' => 0]);

       return redirect()->route('settingusers')->with('success', "Mở Khoá Quyền Sử dụng Người dùng Thành Công");
     }



}
