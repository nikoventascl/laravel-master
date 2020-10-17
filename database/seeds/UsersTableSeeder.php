<?php

use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
        	'name' => 'Super Administrador',
            'apellido' => 'Dawrin',
            'telefono' => '56932284571',
            'rut' => '15.334.885-7',
            'fecha_nacimiento' => '2020-07-21',
        	'email' => 'admin@soltecno.cl',
            'vivienda_id' => 1,
        	'password' => bcrypt('123'),
            'estado' => 1,

        ]);
        $permissions = Permission::pluck('id','id')->all();
        $user->assignRole(1);
    }
}
