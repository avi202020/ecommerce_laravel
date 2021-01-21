<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\AdminLoginRequest;

class AdminLoginController extends Controller
{
    public function __construct(){
        //So vai executar este controller se for um convidado
        $this->middleware('guest:admin');
    }

    public function index(){
        return view("admin.page-login");
    }

    public function store(AdminLoginRequest $request){
        $credentials = ['email'=> $request->email , 'password'=>$request->password];

        $auth = Auth::guard('admin')->attempt($credentials,$request->remember);

        if($auth){
            return redirect()->intended(route('admin'));
        }

        $errors = [$request->email => "E-mail ou senha incorretos, tente novamente."];
        return redirect()->back()->withInput($request->all)->withErrors($errors);
    }
}
