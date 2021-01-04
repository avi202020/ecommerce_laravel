<?php

namespace App\Models;

class Pedido extends ModelDefault
{
    protected $table = "pedidos";

    protected $fillable = ['datapedido','status','usuario_id'];
}
