<?php

namespace App\Http\Controllers\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\users;
use Validator;
use Hash;
use DB;

class SettingController extends Controller
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
     public function setting()
     {
       $country = DB::table('country')->get();
       $province = DB::table('province')->get();
       $district = DB::table('district')->get();
       return view('setting', compact('country','province','district'));
     }

     public function addquocgia(Request $request)
     {
      $validator = $request->validate([
            'quocgia' => 'required|max:255',
        ]);


        DB::table('country')->insert([
          'name' => $request->quocgia,
          ]);

          return redirect()->route('setting');
     }

     public function addthanhpho(Request $request)
     {

      $validator = $request->validate([
             'quocgia' => 'required|max:255',
             'thanhpho' => 'required|max:255',
        ]);


        DB::table('province')->insert([
          'country_id' => $request->quocgia,
          'name' => $request->thanhpho,
          ]);

         return redirect()->route('setting');
     }



     public function addquanhuyen(Request $request)
     {
       $validator = $request->validate([
            'thanhpho' => 'required|max:255',
            'quanhuyen' => 'required|max:255',
        ]);


        DB::table('district')->insert([
          'province_id' => $request->thanhpho,
          'name' => $request->quanhuyen,
          ]);

         return redirect()->route('setting');

     }







}
