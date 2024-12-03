<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion', 'estado','fecha_completada', 'encargado', 'url'];

    protected $dates = ['fecha_completada','created_at', 'updated_at'];

    public function encargado()
    {
        return $this->belongsTo(User::class, 'encargado');
    }

    public function getFechaCompletadaAttribute($value)
    {
        return $value ? Carbon::parse($value) : null;
    }
}

