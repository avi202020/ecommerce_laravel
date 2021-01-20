<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use DB;
use Auth;
use Hash;
use Carbon\Carbon;
use App\Models\Admin;
use App\Mail\ResetPassword;

class ForgotPasswordController extends Controller
{
    public function index(){
        return view('admin.page-forget');
    }

    public function store(Request $request){
        $user = Admin::where('email',$request->email)->first();
        if ( !$user ) return redirect()->back()->withErrors(['error' => '404']);

        //create a new token to be sent to the user
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => Str::random(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_resets')->where('email', $request->email)->first();

        $token = $tokenData->token;
        $name = $user->nome;
        $email = $request->email;

        try {
            Mail::to($email)->send(new ResetPassword($token,$name));
        } catch (\Throwable $th) {
            //throw $th;
        }

        return redirect()->route('admin.login');
    }
}
