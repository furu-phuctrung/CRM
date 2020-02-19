<?php

namespace App\Http\Controllers\Setting;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\users;
use Validator;
use Hash;
use DB;

class SettingCrmController extends Controller
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

public function settingcrm()
     {
      $customer_group = DB::table('customer_group')->get();
      $product_group = DB::table('product_group')->get();
      $customer_resource = DB::table('customer_resource')->get();
      $products = DB::table('products')->get();
      $unit = DB::table('unit')->get();
      $relationships = DB::table('relationships')->get();
      $method_payment = DB::table('method_payment')->get();

       return view('cauhinhcrm', compact('customer_group','customer_resource','product_group','products','unit','relationships','method_payment'));
     }


public function addcustomergroup(Request $request)
     {
      $validator = $request->validate([
            'name' => 'required|max:255',
        ]);
        $code =  str_slug($request->name,'-');
        DB::table('customer_group')->insert([
          'name' => $request->name,
          'code' => $code,
          ]);

          return redirect()->route('settingcrm');
     }


public function addcustomerresource(Request $request)
     {
      $validator = $request->validate([
            'name' => 'required|max:255',
        ]);
        $code =  str_slug($request->name,'-');
        DB::table('customer_resource')->insert([
          'name' => $request->name,
          'code' => $code,
          ]);
          return redirect()->route('settingcrm');
     }


public function addproductgroup(Request $request)
     {
      $validator = $request->validate([
            'name' => 'required|max:255',
        ]);
        $code =  str_slug($request->name,'-');
        DB::table('product_group')->insert([
          'name' => $request->name,
          'code' => $code,
          ]);
          return redirect()->route('settingcrm');
     }


public function addproduct(Request $request)
          {
           $request->validate([
                 'name' => 'required|max:255',
                 'nhomsanpham' => 'required|integer',
             ]);
             $code = 'SP-0'.str_random(9);
             DB::table('products')->insert([
               'name' => $request->name,
               'product_group_id' => $request->nhomsanpham,
               'code' => $code,
               ]);
               return redirect()->route('settingcrm');
          }


public function addunit(Request $request)
          {
           $request->validate([
                 'name' => 'required|max:255',
             ]);
             $code =  str_slug($request->name,'-');
             DB::table('unit')->insert([
               'name' => $request->name,
               'code' => $code,
               ]);
               return redirect()->route('settingcrm');
          }

public function addrelationships(Request $request)
          {
           $request->validate([
                 'name' => 'required|max:255',
                 'color' => 'required|max:255',
             ]);
             DB::table('relationships')->insert([
               'name' => $request->name,
               'color' => $request->color,
               ]);
               return redirect()->route('settingcrm');
          }

public function addmethodpayment(Request $request)
          {
           $request->validate([
                 'name' => 'required|max:255',
             ]);
             $code =  str_slug($request->name,'-');
             DB::table('method_payment')->insert([
               'name' => $request->name,
               'code' => $code,
               ]);
               return redirect()->route('settingcrm');
          }



}
