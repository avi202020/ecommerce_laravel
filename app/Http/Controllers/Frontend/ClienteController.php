<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Services\ClienteService;
use App\Models\Usuario;
use App\Models\Endereco;
use App\Http\Controllers\Controller;

class ClienteController extends Controller
{
    public function cadastrar(Request $request){
        $data = [];
        return view('frontend.cadastrar',$data);
    }

    public function store(Request $request){
        $data = $request->all();

        $usuario = new Usuario();
        $usuario->fill($data);
        $usuario->login = $request->input('cpf');
        $usuario->password = \Hash::make($request->input('password'));

        $endereco = new Endereco($data);
        $endereco->logradouro = $request->input('endereco');

        $cli = new ClienteService();
        $result = $cli->store($usuario,$endereco);

        $message = $result['message'];
        $status = $result['status'];

        $request->session()->flash($status,$message);

        return redirect()->route('cadastrar');
    }
}
