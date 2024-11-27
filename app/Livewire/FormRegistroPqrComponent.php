<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Peticion;

class FormRegistroPqrComponent extends Component
{
    
    public $nombreCompleto;
    public $numeroCuenta;
    public $correo;
    public $telefono;
    public $tipoPeticion;
    public $descripcion;
    public $preferenciaContacto;
    public $consentimiento;

    public $mensaje;

    public function save()
    {
        // Guardar el dato

        //dd($this->nombreCompleto);
        

        // TODO: guardar en la base de datos

        try {
            //code...
            $item = new Peticion();
           
            $item->nombreCompleto = $this->nombreCompleto;
            $item->numeroCuenta = $this->numeroCuenta;
            $item->correo = $this->correo;
            $item->telefono = $this->telefono;
            $item->tipoPeticion = $this->tipoPeticion;
            $item->descripcion = $this->descripcion;
            $item->preferenciaContacto = $this->preferenciaContacto;
            $item->consentimiento = $this->consentimiento;
            $respuesta = $item->save();
            $usar = $item->id;
    
            $this->mensaje = 'Peticion generada con exito.'.$respuesta. $usar ;

        } catch (\Throwable $th) {
            $this->mensaje = 'Hay un error: ' . $th->getMessage();
        }

        //session()->flash('status', 'Peticion generada con exito.', $respuesta);
 
        return redirect()->route('pqr.registrar');
    }

    public function render()
    {
        return view('livewire.form-registro-pqr-component');
    }
}
