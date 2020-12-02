<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $produtos = \App\Models\Produto::all();
        return view('home',compact('produtos'));
    }

    public function categoria(Request $request){
        $data = [];
        return view('categoria',$data);
    }
}
