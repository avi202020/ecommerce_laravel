<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'products.index','guard_name'=>'admin']);
        Permission::create(['name' => 'products.store','guard_name'=>'admin']);
        Permission::create(['name' => 'products.edit','guard_name'=>'admin']);
        Permission::create(['name' => 'products.destroy','guard_name'=>'admin']);
    }
}
