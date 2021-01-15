<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Produto;
use App\Http\Controllers\Controller;

class ProdutoController extends Controller
{
    public function index(Request $request){
        $produtos = Produto::all();
        return view('frontend.home',compact('produtos'));
    }

    public function categoria(Request $request, $idcategoria = 0){
        $categorias = Categoria::all();
        $queryProds = Produto::where('id','>',0);

        if($idcategoria != 0){
            $queryProds->where('categoria_id',$idcategoria);
        }

        $produtos = $queryProds->get();
        return view('frontend.categoria',compact('categorias','produtos','idcategoria'));
    }
}
