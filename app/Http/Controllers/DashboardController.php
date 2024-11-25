<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function contenidoDash()
    {
        if (FacadesAuth::user()->role === 'admin'){

            $conteo = DB::table('peticiones')
            ->where('responsable', 'Por Asignar' )
            ->count();

            $conteoM = DB::table('metas')
                        ->where('estado', 'Pendiente' )
                        ->count();

            return view('dashboard',['conteo' => $conteo, 'conteoM' => $conteoM]);
        }else{
            $nombreUsuario = FacadesAuth::user()->id;
            $conteo = DB::table('peticiones')
                        ->where('responsable', $nombreUsuario )
                        ->count();
                        $nombreUsuario = FacadesAuth::user()->id;
            $conteoM = DB::table('metas')
                        ->where('encargado', $nombreUsuario )
                        ->count();
            return view('dashboard',['conteo' => $conteo, 'conteoM' => $conteoM]);
        }
    }
}

