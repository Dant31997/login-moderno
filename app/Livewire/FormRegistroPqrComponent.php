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
    public $mensajeTipo;

    public $mensaje;

    public function save()
    {
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

            // Mensaje de éxito
            $this->mensaje = 'Petición generada con éxito.';
            $this->mensajeTipo = 'success'; // Define el tipo de mensaje
        } catch (\Throwable $th) {
            // Mensaje de error
            $this->mensaje = 'Hay un error: ' . $th->getMessage();
            $this->mensajeTipo = 'danger'; // Define el tipo de mensaje
        }

        return;
    }

    public function render()
    {
        return view('livewire.form-registro-pqr-component');
    }
}
