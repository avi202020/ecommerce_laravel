<?php

namespace App\Models;

class Produto extends ModelDefault
{
    protected $table = "produtos";

    protected $fillable = ['nome','valor','foto','descricao','categoria_id'];
}
