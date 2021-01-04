<?php

namespace App\Models;

class Endereco extends ModelDefault
{
    protected $table = "enderecos";

    protected $fillable = ['logradouro','complemento','numero','cidade','cep','complemento','usuario_id'];

    public function setCepAttribute($cep){
        $value = preg_replace("/[^0-9]/","",$cep);
        $this->attributes["cep"] = $value;
    }
}
