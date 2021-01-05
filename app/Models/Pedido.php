<?php

namespace App\Models;

class Pedido extends ModelDefault
{
    protected $table = "pedidos";
    protected $dates = ["datapedido"];
    protected $fillable = ['datapedido','status','usuario_id'];

    public function statusDesc(){
        $desc = '';
        switch ($this->status) {
            case 'PEN': $desc = 'Pendente'; break;
            case 'APR': $desc = 'Aprovado'; break;
            case 'CAN': $desc = 'Cancelado'; break;
        }
        return $desc;
    }
}
