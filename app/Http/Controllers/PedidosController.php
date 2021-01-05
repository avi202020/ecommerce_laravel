<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\ItensPedido;
use Auth;

class PedidosController extends Controller
{
    public function index(Request $request){
        $data = [];

        $idusuario = Auth::user()->id;
        $pedidos = Pedido::where('usuario_id',$idusuario)->orderBy('datapedido','desc')->get();

        return view("painel.pedidos",compact('pedidos'));
    }

    public function show(Request $request){
        $idpedido = $request->input('idpedido');
        $itens = ItensPedido::join("produtos","produtos.id","=","itens_pedidos.produto_id")
            ->where("pedido_id",$idpedido)
            ->get(['itens_pedidos.*','itens_pedidos.valor as valorItem','produtos.*']);
        $data = [];
        $data["listaItens"] = $itens;
        return view("painel.pedidos_modal",$data);
    }
}
