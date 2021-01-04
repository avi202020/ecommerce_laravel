<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function index(Request $request){
        return view("login");
    }

    public function store(Request $request){
        $cpf = preg_replace("/[^0-9]/","",$request->input("login"));
        $credential = ['login'=> $cpf, 'password'=> $request->input("password")];

        if(Auth::attempt($credential) ){
            return redirect()->route("home");
        }else{
            $request->session()->flash("err","CPF/Senha inválido");
            return redirect()->route("login");
        }

        return view("login");
    }

    public function destroy(Request $request){
        Auth::logout();
        return redirect()->route("home");
    }

}
