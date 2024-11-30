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
            $item = new Peticion();
            $item->nombreCompleto = $this->nombreCompleto;
            $item->numeroCuenta = $this->numeroCuenta;
            $item->correo = $this->correo;
            $item->telefono = $this->telefono;
            $item->tipoPeticion = $this->tipoPeticion;
            $item->descripcion = $this->descripcion;
            $item->preferenciaContacto = $this->preferenciaContacto;
            $item->consentimiento = $this->consentimiento;

            // Guardar en la base de datos
            $item->save();

            session()->flash('success', 'Petición generada con éxito. El numero unico de la petición es: ' . $item->id);
    
                return redirect()->route('pqr.registrar');

} catch (\Throwable $th) {
    // Si ocurre un error
    session()->flash('error', 'Hay un error: ' . $th->getMessage());
        return redirect()->route('pqr.registrar');
}
}

    public function render()
    {
        return view('livewire.form-registro-pqr-component');
    }
}
