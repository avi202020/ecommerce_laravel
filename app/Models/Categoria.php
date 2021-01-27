<?php

namespace App\Models;

class Categoria extends ModelDefault
{
    protected $table = "categorias";

    protected $fillable = ['descricao'];

    public function produtos()
    {
        return $this->hasMany(Produto::class,'categoria_id');
    }
}
