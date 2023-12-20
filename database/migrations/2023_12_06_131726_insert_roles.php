<?php

use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

class InsertRoles extends Migration
{
    public function up()
    {
        // Agregar roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'consultor']);
    }

    public function down()
    {
        // Puedes revertir la inserción de roles si es necesario
        Role::whereIn('name', ['admin', 'user', 'consultor'])->delete();
    }
}
