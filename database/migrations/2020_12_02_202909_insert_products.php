<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $cat = new \App\Models\Categoria(['descricao'=>'geral']);
        $cat->save();

        $prod = new \App\Models\Produto(['nome'=>'Produto 1','valor'=>10,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat->id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome'=>'Produto 2','valor'=>10,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome'=>'Produto 3','valor'=>10,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat->id]);
        $prod3->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
