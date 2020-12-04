<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $produtos = Produto::all();
        return view('home',compact('produtos'));
    }

    public function categoria(Request $request, $idcategoria = 0){
        $categorias = Categoria::all();
        $queryProds = Produto::limit(2);

        if($idcategoria != 0){
            $queryProds->where('categoria_id',$idcategoria);
        }

        $produtos = $queryProds->get();
        return view('categoria',compact('categorias','produtos'));
    }
}
