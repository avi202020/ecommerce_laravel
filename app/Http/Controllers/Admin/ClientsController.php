<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ClientsRequest;
use App\Services\UploadPublicService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Usuario;

class ClientsController extends Controller
{
    public function index()
    {
        $clients = Usuario::paginate(10);
        $title = 'Listando Clientes';
        return view('admin.clients.index',compact('clients','title'));
    }

    public function create()
    {
        $title = "Criando Clientes";
        return view('admin.clients.create',compact('title'));
    }

    public function store(ClientsRequest $request)
    {
        $user = Usuario::create($request->all());
        if ($request->hasFile('image')) {
            $path = UploadPublicService::uploadFile($request->file('image'), 'clients');
            $user->image = $path;
            $user->save();
        }
        return redirect()->route('clients.index')->with(['class'=>'success','message'=>'Usuário cadastrado com sucesso']);
    }

    public function edit($id)
    {
        $user = Usuario::find($id);
        if(empty($user)){
            return redirect()->route('clients.index')->withErrors(['error' => 'Cliente não localizado']);
        }
        $title = 'Editanto Usuário : #'.$user->id.' - '.$user->nome;
        return view('admin.clients.edit',compact('title','user'));
    }

    public function update(ClientsRequest $request, $id)
    {
        $user = Usuario::find($id);
        if(empty($user)){
            return redirect()->route('clients.index')->withErrors(['error' => 'Cliente não localizado']);
        }
        $data = $request->all();
        if(empty($data['password'])){
            unset($data['password']);
        }
        $user->update($data);
        if ($request->hasFile('image')) {
            $path = UploadPublicService::uploadFile($request->file('image'), 'clients');
            $user->image = $path;
            $user->save();
        }
        return redirect()->route('clients.edit',$user->id)->with(['class'=>'success','message'=>'Cliente editado com sucesso']);
    }

    public function destroy($id)
    {
        $user = Usuario::find($id);
        if(empty($user)){
            return redirect()->route('clients.index')->withErrors(['error' => 'Usuário não localizado']);
        }
        $user->delete();
        return redirect()->back()->with(['class'=>'success','message'=>'Usuário deletado com sucesso']);
    }
}
