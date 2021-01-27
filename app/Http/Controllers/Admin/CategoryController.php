<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Models\Categoria;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Categoria::paginate(10);
        return view('admin.categories.index',compact('categories'));
    }

    public function create()
    {
        $title = 'Cadastro de Categorias';
        return view('admin.categories.create',compact('title'));
    }

    public function store(CategoryRequest $request)
    {
        $category = new Categoria($request->all());
        $category->save();
        return redirect()->route('categories.index')->with(['class'=>'success','message'=>'Produto cadastrado com sucesso']);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $category = Categoria::find($id);
        if(empty($category)){
            return redirect()->route('categories.index')->withErrors(['error' => 'Categoria não localizada']);
        }
        $title = 'Editanto Categoria : #'.$category->id.' - '.$category->descricao;
        return view('admin.categories.edit',compact('title','category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $category = Categoria::find($id);
        $category->update($request->all());
        return redirect()->route('categories.edit',$category->id)->with(['class'=>'success','message'=>'Produto editado com sucesso']);
    }

    public function destroy($id)
    {
        $category = Categoria::find($id);
        if(empty($category)){
            return redirect()->route('categories.index')->withErrors(['error' => 'Produto não localizado']);
        }else if($category->produtos()->count()>0){
            return redirect()->route('categories.index')->withErrors(['error' => 'Esta categoria possui relacionamento com produtos, resolva e tente novamente']);
        }
        $category->delete();
        return redirect()->route('categories.index')->with(['class'=>'success','message'=>'Produto deletado com sucesso']);
    }
}
