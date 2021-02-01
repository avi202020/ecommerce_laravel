<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;
use App\Services\UploadPublicService;

use App\Models\Produto;
use App\Models\Categoria;
use Auth;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        dd($request->user()->hasDirectPermission('products.index'));
        $user = Auth::guard('admin')->user();
        dd($user->assignRole('Admin Master'));
        $products = Produto::paginate(10);
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $title = 'Cadastro Produto';
        $categorias = Categoria::all();
        return view('admin.products.create',compact('title','categorias'));
    }

    public function store(ProductsRequest $request)
    {
        $produto = new Produto($request->all());
        if ($request->hasFile('foto')) {
            $path = UploadPublicService::uploadFile($request->file('foto'), 'produtos');
            $produto->foto = $path;
        }
        $produto->save();
        return redirect()->route('products.index')->with(['class'=>'success','message'=>'Produto cadastrado com sucesso']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $produto = Produto::find($id);
        if(empty($produto)){
            return redirect()->route('products.index')->withErrors(['error' => 'Produto não localizado']);
        }
        $title = 'Editanto Produto : #'.$produto->id.' - '.$produto->nome;
        $categorias = Categoria::all();
        return view('admin.products.edit',compact('title','produto','categorias'));
    }

    public function update(ProductsRequest $request, $id)
    {
        $produto = Produto::find($id);
        $produto->update($request->all());
        if ($request->hasFile('foto')) {
            $path = UploadPublicService::uploadFile($request->file('foto'), 'produtos');
            $produto->foto = $path;
            $produto->save();
        }
        return redirect()->route('products.edit',$produto->id)->with(['class'=>'success','message'=>'Produto editado com sucesso']);
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        if(empty($produto)){
            return redirect()->route('products.index')->withErrors(['error' => 'Produto não localizado']);
        }
        $produto->delete();
        return redirect()->route('products.index')->with(['class'=>'success','message'=>'Produto deletado com sucesso']);
    }
}
