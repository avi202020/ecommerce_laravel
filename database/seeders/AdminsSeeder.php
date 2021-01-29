<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'nome' => 'Admin Master',
            'email'=> 'admin@a.com',
            'password'=> \Hash::make('123456'),
            'created_at'=> date("Y-m-d"),
            'updated_at'=> date("Y-m-d"),
        ];
        DB::table('admins')->insert($data);
    }
}
