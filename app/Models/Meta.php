<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'estado', 'fecha_completada', 'encargado'];

    protected $dates = ['fecha_completada', 'created_at', 'updated_at'];

    // Relación con el modelo User (empleado encargado de la meta)
    public function encargado()
    {
        return $this->belongsTo(User::class, 'encargado');
    }

    // Asegurarnos que fecha_completada sea un objeto Carbon, incluso si está nulo
    public function getFechaCompletadaAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
}

