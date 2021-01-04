<?php

namespace App\Services;

use App\Models\Usuario;
use App\Models\Endereco;
use Log;

class ClienteService{

    public function store(Usuario $user, Endereco $endereco){
        try {
            $dbUsuario = Usuario::where('login',$user->login)->first();
            if($dbUsuario){
                return ['status'=>'err','message'=>'CPF em uso no sistema'];
            }
            \DB::beginTransaction();
            $user->save();
            $endereco->usuario_id = $user->id;
            $endereco->save();
            \DB::commit();
            return ['status'=>'ok','message'=>'Usuário cadastrado com sucesso'];
        } catch (\Throwable $th) {
            Log::error("erro",['file'=>'ClienteService.store','message'=>$th->getMessage()]);
            \DB::rollback();
            return ['status'=>'err','message'=>'Não pode cadastrar usuário'];
        }
    }
}
