<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RolePermissionRequest;
use Illuminate\Support\Str;

class RolesPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        $title = 'Listando Perfis';
        return view('admin.roles.index',compact('title','roles'));
    }

    public function create()
    {
        $title = 'Criando novo Perfil de Usuário';
        return view('admin.roles.create',compact('title'));
    }

    public function store(RolePermissionRequest $request)
    {
        $role = Role::create(['name' => $request->name]);
        if($role){
            return redirect()->route('permissions.index')->with(['class'=>'success','message'=>'Perfil de usuário cadastrado com sucesso']);
        }else{
            return redirect()->route('permissions.index')->with(['class'=>'danger','message'=>'Erro ao criar perfil de usuário']);
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = $role->permissions()->get()->pluck('name')->toArray();
        $title = 'Editando  Perfil de Usuário : #'.$role->id.' '.$role->name;
        return view('admin.roles.edit',compact('title','role','permissions'));
    }

    public function update(RolePermissionRequest $request, $id)
    {
        $role = Role::find($id);
        if($role){
            $role->update($request->all());
            $role->syncPermissions($request->permissions);
        }
        return redirect()->route('permissions.edit',$role->id)->with(['class'=>'success','message'=>'Perfil de usuário editado com sucesso']);
    }

    public function destroy($id)
    {
        $role = Role::find($id);
        if($role){
            $role->delete();
        }
        return redirect()->route('permissions.index',$role->id)->with(['class'=>'success','message'=>'Perfil de usuário apagado com sucesso']);
    }
}
