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
            return redirect()->back()->with('error', 'Peticiones no encontradas');
        }


        //vista retornada
        return view('consultapqr',compact('peticiones'));
    }

}
