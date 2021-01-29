<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAccessCrudRequest;
use Illuminate\Http\Request;
use App\Services\UploadPublicService;

use App\Models\Admin;

class AdminAcessController extends Controller
{
    public function index()
    {
        $users =  Admin::paginate(10);
        $title = 'Listando Usuários Admin';
        return view('admin.users.index',compact('users','title'));
    }

    public function create()
    {
        $title = "Criando Usuário Admin";
        return view('admin.users.create',compact('title'));
    }

    public function store(AdminAccessCrudRequest $request)
    {
        $admin = Admin::create($request->all());
        if ($request->hasFile('image')) {
            $path = UploadPublicService::uploadFile($request->file('image'), 'users_admin');
            $admin->image = $path;
            $admin->save();
        }
        return redirect()->route('admins.index')->with(['class'=>'success','message'=>'Usuário cadastrado com sucesso']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $user = Admin::find($id);
        if(empty($user)){
            return redirect()->route('admins.index')->withErrors(['error' => 'Usuário não localizado']);
        }
        $title = 'Editanto Usuário : #'.$user->id.' - '.$user->nome;
        return view('admin.users.edit',compact('title','user'));
    }

    public function update(AdminAccessCrudRequest $request, $id)
    {
        $user = Admin::find($id);
        if(empty($user)){
            return redirect()->route('admins.index')->withErrors(['error' => 'Usuário não localizado']);
        }
        $data = $request->all();
        if(empty($data['password'])){
            unset($data['password']);
        }
        $user->update($data);
        if ($request->hasFile('image')) {
            $path = UploadPublicService::uploadFile($request->file('image'), 'users_admin');
            $user->image = $path;
            $user->save();
        }
        return redirect()->route('admins.edit',$user->id)->with(['class'=>'success','message'=>'Usuário editado com sucesso']);
    }

    public function destroy($id)
    {
        $user = Admin::find($id);
        if(empty($user)){
            return redirect()->route('admins.index')->withErrors(['error' => 'Usuário não localizado']);
        }
        $user->delete();
        return redirect()->back()->with(['class'=>'success','message'=>'Usuário deletado com sucesso']);
    }
}
