<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peticion extends Model
{
    use HasFactory;

    protected $table = "peticiones";
    protected $fillable = ['nombreCompleto', 'numeroCuenta', 'correo', 'telefono', 'tipoPeticion', 'asunto', 'descripcion', 'respuesta','estado', 'preferenciaContacto', 'responsable'];
    protected $primaryKey ='id';

    // Relación con el modelo User (Empleado)
    public function responsableEmpleado()
    {
        return $this->belongsTo(User::class, 'responsable');
    }
}
