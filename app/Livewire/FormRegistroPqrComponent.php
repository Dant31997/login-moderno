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

    // Si la solicitud fue exitosa
    $this->mensaje = 'Petición generada con éxito. El numero unico de la petición es: ' . $item->id; // Incluye el ID generado
    $this->mensajeTipo = 'success'; // Tipo de mensaje de éxito
    return redirect()->route('pqr.registrar', ['id' => $item->id]);

} catch (\Throwable $th) {
    // Si ocurre un error
    $this->mensaje = 'Hay un error: ' . $th->getMessage();
    $this->mensajeTipo = 'danger'; // Tipo de mensaje de error
    return redirect()->route('pqr.registrar'); // Redirige después de guardar
}
}

    public function render()
    {
        return view('livewire.form-registro-pqr-component');
    }
}
