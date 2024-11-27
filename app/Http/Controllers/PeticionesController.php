<?php

namespace App\Http\Controllers;

use App\Models\Peticion;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;


class PeticionesController extends Controller
{
    public function index()
    {
        
        // Es admin
    if (FacadesAuth::user()->role === 'admin'){
        $peticiones = Peticion::all(); // O puedes usar paginación: Peticion::paginate(10);
    } else{
// Sino
        $peticiones = Peticion::where('responsable', auth()->user()->id)->get(); // O puedes usar paginación: Peticion::paginate(10);
    }
        return view('peticiones.index', compact('peticiones'));
    }
    public function registrarPQR(){
        // dd('aqui');
        return view ('publico.form-pqr');
    }

    // Mostrar el formulario para crear una nueva petición
    public function create()
    {
        return view('peticiones.create');
    }

    // Guardar una nueva petición
    public function store(Request $request)
    {
        $request->validate([
            'tipoPeticion' => 'required|string|in:Peticion,Queja, Reclamo',
            'descripcion' => 'required|string',
        ]);

        Peticion::create($request->all());

        return redirect()->route('peticiones.index')->with('success', 'Petición creada con éxito.');
    }

    // Mostrar el formulario para editar una petición
    public function edit($id)
    {
        $peticion = Peticion::findOrFail($id);
        // Obtener solo los empleados con el rol 'employee'
        $empleados = User::where('role', 'employee')->get();
        return view('peticiones.edit', compact('peticion', 'empleados')); 
    }

    // Actualizar una petición
    public function update(Request $request, $id)
    {
        $request->validate([
            'responsable' => 'required|string|max:255',
            'respuesta' => 'required|string|max:255',
            'estado' => 'required|string|max:255',
        ]);

        $peticion = Peticion::findOrFail($id);
        $peticion->responsable = $request->input('responsable');
        $peticion->respuesta = $request->input('respuesta');
        $peticion->estado = $request->input('estado');
        $peticion->save();

        return redirect()->route('peticiones.index')->with('success', 'Petición actualizada con éxito.');
    }

    // Eliminar una petición
    public function destroy($id)
    {
        $peticion = Peticion::findOrFail($id);
        $peticion->delete();

        return redirect()->route('peticiones.index')->with('success', 'Petición eliminada con éxito.');
    }
}
