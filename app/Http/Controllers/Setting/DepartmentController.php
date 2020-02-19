<?php

namespace App\Http\Controllers\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\users;
use Validator;
use Hash;
use DB;
use Response;
class DepartmentController extends Controller
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



     public function settingdepartment()
     {
        $phongban = DB::table('department')->get();

       return view('department', compact(['phongban']));
     }

     public function datadepartment()
     {
        $phongban = DB::table('department')->get();

       return Response::json($phongban);
     }

     public function settingadddepartment()
     {

       $phongban = DB::table('department')->get();


       return view('adddepartment', compact(['phongban']));
     }

     public function adddepartment(Request $request)
     {
       $validator = $request->validate([
              'name' => 'required|max:255',
              'parent' => 'required|max:255',
         ]);
         DB::table('department')->insert([
           'name' => $request->name,
           'pid' => $request->parent,
           ]);
          return redirect()->route('department');
     }




}
