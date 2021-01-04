<?php

namespace App\Models;

class ItensPedido extends ModelDefault
{
    protected $table = "itens_pedidos";

    protected $fillable = ['quantidade','valor','dt_item','pedido_id','produto_id'];
}
