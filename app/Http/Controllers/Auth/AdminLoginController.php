<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function __construct(){
        //So vai executar este controller se for um convidado
        $this->middleware('guest:admin');
    }

    public function index(){
        return view("admin.page-login");
    }

    public function store(Request $request){
        $this->validate($request,[
            'email' => 'required|string',
            'password'=>'required'
        ]);

        $credentials = ['email'=> $request->email , 'password'=>$request->password];

        $auth = Auth::guard('admin')->attempt($credentials,$request->remember);

        if($auth){
            return redirect()->intended(route('admin'));
        }
        return redirect()->back()->withInputs($request->only('email','remember'));
    }
}
