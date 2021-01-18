<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Hash;
use Auth;
use DB;

class ResetPasswordController extends Controller
{
    public function index($token)
    {
        $tokenData = DB::table('password_resets')
        ->where('token', $token)->first();
        if ( !$tokenData ) return redirect()->to('home'); //redirect them anywhere you want if the token does not exist.
        return view('admin.page-confirm-password',compact('tokenData'));
    }

    public function store(Request $request, $token)
    {
        //some validation
        $password = $request->password;
        $tokenData = DB::table('password_resets')->where('token', $token)->first();

        $user = Admin::where('email', $tokenData->email)->first();
        if ( !$user ) return redirect()->to('home'); //or wherever you want

        $user->password = Hash::make($password);
        $user->update(); //or $user->save();

        //do we log the user directly or let them login and try their password for the first time ? if yes
        Auth::guard('admin')->login($user);

        // If the user shouldn't reuse the token later, delete the token
        DB::table('password_resets')->where('email', $user->email)->delete();
        return redirect()->route('admin');
        //redirect where we want according to whether they are logged in or not.
    }
}
