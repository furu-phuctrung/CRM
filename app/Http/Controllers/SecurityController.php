<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\users;
use DB;
use Validator;
use Hash;


class SecurityController extends Controller
{


public function show2faForm()
{
  return view('auth.2fa');
}

public function generate2faSecret(Request $request)
{

        $user = Auth::user();

          if($user->google2fa_old_active == '0'){

            $google2fa = app('pragmarx.google2fa');

            $registrationData = $request->all();

            $registrationData['google2fa_secret'] = $google2fa->generateSecretKey();

            $request->session()->flash('registration_data', $registrationData);

            $qrImage = $google2fa->getQRCodeInline
            (
                config('app.name'),
                $user->email,
                $registrationData['google2fa_secret']
            );

           DB::table('users')->where('id', Auth::user()->id)->update
           (
             ['google2fa_secret' => $registrationData['google2fa_secret']]
           );

      return view('auth.2fa', ['qrImage' => $qrImage, 'secret' => $registrationData['google2fa_secret']]);


   }else{

      $google2fa = app('pragmarx.google2fa');

      $google2fa_secret = DB::table('users')->where('id', $user->id)->select('google2fa_secret')->get();



      $qrImage = $google2fa->getQRCodeInline(
          config('app.name'),
          $user->email,
          $google2fa_secret,
      );

      return view('auth.2fa', compact('qrImage', 'google2fa_secret') );

    }


 return view('auth.2fa');

}

public function enable2fa(Request $request)
{

    $user = Auth::user();

    $google2fa = app('pragmarx.google2fa');

    $secret = $request->input('verify-code');

    $valid = $google2fa->verifyKey($user->google2fa_secret, $secret);

    if ($valid) {

      DB::table('users')->where('id', Auth::user()->id)->update(['google2fa_old_active' => 1, 'google2fa_enable' => 1]);



       return redirect('/cai-dat-thong-tin-ca-nhan')->with('success',"2FA is now Enabled.");

    } else {

      return redirect()->back()->with("error","Your  password does not matches with your account password. Please try again.");

    }
}

public function getdisable2fa()
{

  return view('auth.disable2fa');
}

public function disable2fa(Request $request)
{

      $validatedData = $request->validate([

          'current-password' => 'required',
      ]);

    if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
        // The passwords matches
        return redirect()->back()->with("error","Your  password does not matches with your account password. Please try again.");
    }

      DB::table('users')->where('id', Auth::user()->id)->update(['google2fa_enable' => 0]);


    return redirect('/cai-dat-thong-tin-ca-nhan')->with('success',"2FA is now Disabled.");

}

public function login2fa()
{

    $data = DB::table('customer')->join('customer_users_junction','customer.ID', '=' , 'customer_users_junction.customer_id'  )->where('customer_users_junction.users_id', Auth::user()->id)->get();

  return redirect()->route('home')->with( ['data' => $data] );

}


}
