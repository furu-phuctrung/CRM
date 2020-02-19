<?php

namespace App\Http\Controllers\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\users;
use Validator;
use Hash;
use DB;

class InfocompanyController extends Controller
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


     public function thongtincongty()
     {
        $infocompany = DB::table('infocompany')->get();

       return view('Thongtincongty', compact('infocompany'));
     }




}
