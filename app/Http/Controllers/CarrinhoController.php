<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Services\VendaService;

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

    public function destroy(Request $request, $index){
        $carrinho = session('cart');
        if(isset($carrinho[$index])){
            unset($carrinho[$index]);
            session(['cart'=>$carrinho]);
        }
        return redirect()->route("cart.index");
    }

    public function finish(Request $request){

        $prods = session('cart',[]);

        $vendaService = new VendaService();
        $result = $vendaService->finishSale( $prods , \Auth::user() );

        if($result['status'] == 'ok'){
            $request->session()->forget('cart');
        }

        $request->session()->flash($result['status'],$result['message']);
        return redirect()->route("cart.index");
    }

}
