<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
    
        // Crear usuarios con roles
        User::create(['name' => 'Administrador Sistema', 'username' => 'Admin', 'password' => bcrypt('12345678')])->assignRole('admin');
        User::create(['name' => 'User', 'username' => 'Usuario', 'password' => bcrypt('12345678')])->assignRole('user');
        User::create(['name' => 'Consultor', 'username' => 'Consultor', 'password' => bcrypt('12345678')])->assignRole('consultor');
    }
}
