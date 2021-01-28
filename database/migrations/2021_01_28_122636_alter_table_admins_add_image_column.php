<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableAdminsAddImageColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('image',150)->after('nome');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('admins', function (Blueprint $table) {
            $table->string('image',150)->after('nome');
        });

        $prod5 = new \App\Models\Admin(['nome'=>'Admin','email'=>'admin@a.com','image'=>'barnis.jpg','password'=>\Hash::make('123')]);
        $prod5->save();
    }
}
