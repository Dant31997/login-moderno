<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\DB;
use App\Models\Peticion;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Meta;

class DashboardController extends Controller
{
    public function contenidoDash()
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
        if (FacadesAuth::user()->role === 'admin'){
            $peticiones = Peticion::all(); // O puedes usar paginación: Peticion::paginate(10);
        } else{
    // Sino
            $peticiones = Peticion::where('responsable', auth()->user()->id)->get(); // O puedes usar paginación: Peticion::paginate(10);
        }
        if (FacadesAuth::user()->role === 'admin'){

            $conteo = DB::table('peticiones')
            ->where('responsable', 'Por Asignar' )
            ->count();

            $conteoM = DB::table('metas')
                        ->where('estado', 'Pendiente' )
                        ->count();

            return view('dashboard',['conteo' => $conteo, 'conteoM' => $conteoM, 'peticiones' => $peticiones, 'metas' => $metas]);
        }else{
            $nombreUsuario = FacadesAuth::user()->id;
            $conteo = DB::table('peticiones')
                        ->where('responsable', $nombreUsuario )
                        ->count();
                        $nombreUsuario = FacadesAuth::user()->id;
            $conteoM = DB::table('metas')
                        ->where('encargado', $nombreUsuario )
                        ->count();
            return view('dashboard',['conteo' => $conteo, 'conteoM' => $conteoM, 'peticiones' => $peticiones, 'metas' => $metas]);
        }
    }
}

