<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductsRequest;

use App\Models\Produto;
use App\Models\Categoria;

class ProductsController extends Controller
{
    public function index()
    {
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
        dd($request->all());
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.products.edit');
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
