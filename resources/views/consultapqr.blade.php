@extends('layouts.app-publico')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <img src="http://localhost/LOGIN-MODERNO/resources/img/pixelcut-export.png" style="width: 100px; position:absolute; left:450px; top: 25px " alt="BancApp">
    <title>Consulta de Peticiones</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container mt-5">
        <h1 class="font-weight-bold text-primary text-center">Consulta de Peticiones</h1>

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
        <form class="shadow p-4 rounded bg-gradient-primary text-white mb-2" action="{{ route('consulta.show') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label">Numero de la Petición</label>
                <input 
                    type="text"     
                    name="id" 
                    id="id" 
                    class="form-control"
                    placeholder="Introduce el numero de tu peticion"
                    value="{{ old('id') }}" 
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">Buscar</button>
            <a href="{{ route('pqr.registrar') }}" class="btn btn-danger">Volver</a>
        </form>

        <!-- Mostrar resultados si existen -->
        <div class="shadow p-4 rounded bg-gradient-primary text-white mt-4">
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

                <!-- Respuesta -->
                <div class="mb-3">
                    <label for="respuesta" class="form-label">Respuesta</label>
                    <input 
                        type="text" 
                        id="Respuesta"
                        class="form-control"
                        placeholder="{{ $peticiones->respuesta }}"
                        readonly
                    >
                </div>
            </div>
        @endif
    </div>
</div>
    
</body>
</html>