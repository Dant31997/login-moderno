<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = User::all(); 
        return view('usuarios', compact('usuarios')); 
    }
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6|confirmed', 
            'role' => 'required|string|in:admin,employee',
        ]);

        // Crear un nuevo usuario
        $usuario = new User();
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->password = bcrypt($request->input('password')); 
        $usuario->role = $request->input('role');
        $usuario->save();

        return redirect()->route('usuarios.index')->with('success', 'Empleado creado con éxito.');
    }

    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view('usuarios', compact('usuario'));
    }

    public function update(Request $request, string $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|in:admin,employee',
        ]);

        // Encontrar y actualizar el usuario
        $usuario = User::findOrFail($id);
        $usuario->name = $request->input('name');
        $usuario->email = $request->input('email');
        $usuario->role = $request->input('role');
        $usuario->save();

        // Redirigir a la ruta correcta
        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado con éxito.');
    }


    public function destroy(string $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado con éxito.');
    }
}
