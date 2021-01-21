<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        return view("frontend.login");
    }

    public function store(LoginRequest $request){
        $cpf = preg_replace("/[^0-9]/","",$request->input("login"));
        $credential = ['login'=> $cpf, 'password'=> $request->input("password")];

        if(Auth::attempt($credential)){
            return redirect()->route("home");
        }else{
            return redirect()->back()->withErrors(['error' => 'CPF/Senha inválido']);
        }

        return view("login");
    }

    public function destroy(Request $request){
        Auth::logout();
        return redirect()->route("home");
    }

}
