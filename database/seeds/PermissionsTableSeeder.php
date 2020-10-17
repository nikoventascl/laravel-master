<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
      $permissions = [
         'role-super',
         'role-admin',
         'role-ejecutivo',
         'role-estandar',
      ];
      foreach ($permissions as $permission) {
           Permission::create(['name' => $permission]);
      }
    }
}
