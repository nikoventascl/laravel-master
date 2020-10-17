<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'Super Administrador']);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Ejecutivo']);
        Role::create(['name' => 'Estandar']);
    }
}
