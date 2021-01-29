<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nome' => 'Cliente da Silva',
            'login' => '13734253004',
            'email'=> 'cliente@a.com',
            'password'=> \Hash::make('123456'),
            'created_at'=> date("Y-m-d"),
            'updated_at'=> date("Y-m-d"),
        ];
        DB::table('usuarios')->insert($data);
    }
}
