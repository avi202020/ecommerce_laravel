<?php

namespace App\Models;

class Produto extends ModelDefault
{
    protected $table = "produtos";

    protected $fillable = ['nome','valor','foto','descricao','categoria_id'];

    public function category()
    {
        return $this->belongsTo(Categoria::class,'categoria_id');
    }

    public function setValorAttribute($value){
        $this->attributes["valor"] = str_replace(',','.', str_replace('.','', $value));
    }

    public function getFotoAttribute($value){
        return url($value);
    }
}
