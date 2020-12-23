<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class CarrinhoController extends Controller
{
    public function index(Request $request){
        $carrinho = session('cart');
        return view("cart",compact('carrinho'));
    }

    public function store(Request $request, $idproduto){
        $prod = Produto::find($idproduto);
        if($prod){
            $carrinho = session('cart',[]);
            array_push($carrinho, $prod);
            session(['cart'=>$carrinho]);
        }
        return redirect()->route("home");
    }
}
