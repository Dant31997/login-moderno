@extends('layouts.app-publico')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Peticiones</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1>Consulta de Peticiones</h1>

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulario -->
        <form action="{{ route('consulta.show') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">ID de la Petición</label>
                <input 
                    type="text" 
                    name="id" 
                    id="id" 
                    class="form-control"
                    placeholder="Introduce el ID a buscar"
                    value="{{ old('id') }}" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">Buscar</button>
        </form>

        <!-- Mostrar resultados si existen -->
        @if (isset($peticiones))
            <div class="mt-4">
                <h3>Resultado:</h3>
                
                <!-- Nombre Completo -->
                <div class="mb-3">
                    <label for="nombreCompleto" class="form-label">Nombre Completo</label>
                    <input 
                        type="text" 
                        id="nombreCompleto" 
                        class="form-control"
                        placeholder="{{ $peticiones->nombreCompleto }}"
                        readonly
                    >
                </div>

                <!-- Número de Cuenta -->
                <div class="mb-3">
                    <label for="numeroCuenta" class="form-label">Número de Cuenta</label>
                    <input 
                        type="text" 
                        id="numeroCuenta" 
                        class="form-control"
                        placeholder="{{ $peticiones->numeroCuenta }}"
                        readonly
                    >
                </div>

                <!-- Correo -->
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo</label>
                    <input 
                        type="email" 
                        id="correo" 
                        class="form-control"
                        placeholder="{{ $peticiones->correo }}"
                        readonly
                    >
                </div>

                <!-- Teléfono -->
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input 
                        type="text" 
                        id="telefono" 
                        class="form-control"
                        placeholder="{{ $peticiones->telefono }}"
                        readonly
                    >
                </div>

                <!-- Tipo de Petición -->
                <div class="mb-3">
                    <label for="tipoPeticion" class="form-label">Tipo de Petición</label>
                    <input 
                        type="text" 
                        id="tipoPeticion" 
                        class="form-control"
                        placeholder="{{ $peticiones->tipoPeticion }}"
                        readonly
                    >
                </div>

                <!-- Asunto -->
                <div class="mb-3">
                    <label for="asunto" class="form-label">Asunto</label>
                    <input 
                        type="text" 
                        id="asunto" 
                        class="form-control"
                        placeholder="{{ $peticiones->asunto }}"
                        readonly
                    >
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input 
                        type="text" 
                        id="descripcion" 
                        class="form-control"
                        placeholder="{{ $peticiones->descripcion }}"
                        readonly
                    >
                </div>

                <!-- Cuenta de Contacto -->
                <div class="mb-3">
                    <label for="preferenciaContacto" class="form-label">Cuenta de Contacto</label>
                    <input 
                        type="text" 
                        id="prefenciaContacto" 
                        class="form-control"
                        placeholder="{{ $peticiones->preferenciaContacto }}"
                        readonly
                    >
                </div>

                <!-- Consentimiento -->
                <div class="mb-3">
                    <label for="consentimiento" class="form-label">Consentimiento</label>
                    <input 
                        type="text" 
                        id="consentimiento" 
                        class="form-control"
                        placeholder="{{ $peticiones->consentimiento }}"
                        readonly
                    >
                </div>
            </div>
        @endif
    </div>
</body>
</html>