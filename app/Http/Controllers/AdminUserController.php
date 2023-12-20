<?php

namespace App\Http\Controllers;

use App\Models\User; // Asegúrate de importar el modelo User
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function showUserRegistrationForm()
    {
        $roles = Role::pluck('name');
        return view('register_admin_user', compact('roles'));
    }

    public function registerUser(Request $request)
    {
        // Lógica para registrar al usuario/administrador
        // ...
    
        // Ejemplo de cómo podrías almacenar un nuevo usuario
        $user = User::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'password' => bcrypt($request->input('password')),
        ]);
    
        // Asignar roles utilizando Spatie\Permission
        $user->assignRole($request->input('role'));
    
        // Redirige a la misma vista con un mensaje de éxito
        return redirect()->route('register.admin.user')->with('success', 'Registro exitoso');
    }

}
