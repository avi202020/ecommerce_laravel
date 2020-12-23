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
        $cat2 = new \App\Models\Categoria(['descricao'=>'Camisas']);
        $cat2->save();

        $cat3 = new \App\Models\Categoria(['descricao'=>'Calças']);
        $cat3->save();

        $prod = new \App\Models\Produto(['nome'=>'Camisa','valor'=>10,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat2->id]);
        $prod->save();

        $prod2 = new \App\Models\Produto(['nome'=>'Camisa Polo','valor'=>20,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat2->id]);
        $prod2->save();

        $prod3 = new \App\Models\Produto(['nome'=>'Camisa CK','valor'=>30,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat2->id]);
        $prod3->save();

        $prod4 = new \App\Models\Produto(['nome'=>'Calça Pequena','valor'=>40,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat3->id]);
        $prod4->save();

        $prod5 = new \App\Models\Produto(['nome'=>'Calça Grande','valor'=>40,'foto'=>'barnis.jpg','descricao'=>'','categoria_id'=>$cat3->id]);
        $prod5->save();
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
