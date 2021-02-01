<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin Master','guard_name' => 'admin']);
        Role::create(['name' => 'Conteudoria','guard_name' => 'admin']);
    }
}
