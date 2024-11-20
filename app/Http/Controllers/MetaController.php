<?php

namespace App\Http\Controllers;

use App\Models\Meta;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;
class MetaController extends Controller
{
    public function index()
    {
        if (FacadesAuth::user()->role === 'admin') {
            $metas = Meta::select('metas.*', 'users.name as encargado_name')
            ->leftJoin('users', 'metas.encargado', '=', 'users.id') // Unir la tabla de metas con la de usuarios
            ->get();
        } else {
            $metas = Meta::select('metas.*', 'users.name as encargado_name')
            ->leftJoin('users', 'metas.encargado', '=', 'users.id') // Unir la tabla de metas con la de usuarios
            ->where('metas.encargado', FacadesAuth::id())
            ->get();
        }
        // Sino


        return view('metas.index', compact('metas'));
    }


    public function create()
    {
        // Recuperar todos los usuarios con el rol 'employee'
        $empleados = User::where('role', 'employee')->get();

        // Pasar la lista de empleados a la vista
        return view('metas.create', compact('empleados'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'encargado' => 'required|exists:users,id',
        ]);

        $meta = new Meta();
        $meta->descripcion = $request->input('descripcion');
        $meta->encargado = $request->input('encargado');
        $meta->estado = 'Pendiente'; // Si no se selecciona el estado, se asigna Pendiente por defecto

        // Asignar la fecha de completado solo si el estado es "Completada"
        if ($request->input('estado') === 'Completada') {
            $meta->fecha_completada = now(); // Usa la función `now()` para asignar la fecha actual
        }

        $meta->save();

        return redirect()->route('metas.index')->with('success', 'Meta creada exitosamente.');
    }

    public function edit(string $id)
    {
        $meta = Meta::findOrFail($id);
        $empleados = User::where('role', 'employee')->get(); // Obtener solo empleados

        return view('metas.edit', compact('meta', 'empleados'));
    }

    // Método para actualizar los datos de la meta en la base de datos
    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'estado' => 'required|string|in:Pendiente,En proceso,Completada',
            'encargado' => 'required|exists:users,id',
        ]);

        $meta = Meta::findOrFail($id);
        $meta->descripcion = $request->input('descripcion');
        $meta->estado = $request->input('estado');
        $meta->encargado = $request->input('encargado');

        // Si el estado es "Completada", asignamos la fecha de completado
        if ($meta->estado === 'Completada' && !$meta->fecha_completada) {
            $meta->fecha_completada = now(); // Solo asigna la fecha si aún no se ha asignado
        }

        $meta->save();

        return redirect()->route('metas.index')->with('success', 'Meta actualizada exitosamente.');
    }


    public function destroy(string $id)
    {
        $metas = Meta::findOrFail($id);
        $metas->delete();

        return redirect()->route('metas.index')->with('success', 'Meta eliminada exitosamente.');
    }
}
