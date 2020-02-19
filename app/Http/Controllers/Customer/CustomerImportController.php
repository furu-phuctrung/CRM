<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Customer;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Imports\CustomerImport;

class CustomerImportController extends Controller
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


    //
    public function postUploadCustomer(Request $rq){
        if($rq->hasFile('customer')){
            // dd('ok');
            Excel::import(new CustomerImport, request()->file('customer'));
        }
        return redirect()->back();
    }
}
