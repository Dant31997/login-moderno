<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('consultapqr');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        //
        $request->validate(
            ['id'=>'required|numeric']
        );

        //consultar en la base de datos
        $peticiones=DB::table('peticiones')->
        where('id', $request->input('id'))->first();

        if (!$peticiones) {
            // En caso de que no se encuentre la petición, puedes mostrar un mensaje o redirigir
            return redirect()->back()->with('error', 'Petición no encontrada.');
        }
        


        //vista retornada
        return view('consultapqr',compact('peticiones'));
    }
    public function checkId(Request $request)
{
    $id = $request->input('id');

    // Reemplaza 'YourModel' con el modelo correspondiente
    $exists = \App\Models\Peticion::find($id);

    if (!$exists) {
        // Redirige de vuelta con un mensaje de error
        return back()->with('error', 'El número unico no se encuentra en la base de datos.');
    }

    // Continuar con la lógica si el ID existe
    return back()->with('success', 'Encontrado.');
}

}
