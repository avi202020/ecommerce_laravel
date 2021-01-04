<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Pedido;
use App\Models\ItensPedido;

use Log;

class VendaService{

    public function finishSale($prods = [], Usuario $user){
        try {
            \DB::beginTransaction();

            $today = new \DateTime();

            $pedido = new Pedido();
            $pedido->datapedido = $today->format("Y-m-d H:i:s");
            $pedido->status = "PEN";
            $pedido->usuario_id = $user->id;
            $pedido->save();

            foreach($prods as $p){
                $item = new ItensPedido();
                $item->quantidade = 1;
                $item->valor = $p->valor;
                $item->dt_item = $today;
                $item->pedido_id = $pedido->id;
                $item->produto_id = $p->id;
                $item->save();
            }

            \DB::commit();
            return [ 'status'=>'ok', 'message'=>'Venda realizada com sucesso' ];
        } catch (\Throwable $th) {
            \DB::rollback();
            Log::error("Erro: Venda Service",['message'=>$th->getMessage()]);
            return [ 'status'=>'err', 'message'=>'Venda não pode ser finalizada' ];
        }
    }
}
