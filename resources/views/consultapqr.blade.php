@extends('layouts.app-publico')

@section('content')
    <div class="container mt-5">

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

        <!-- Formulario de búsqueda -->
        <form class="bg-gradient-primary p-4 rounded-lg" action="{{ route('consulta.show') }}" method="POST">
            <div class="d-flex justify-content-center align-items-center text-center mb-4">
                <div class="sidebar-brand-icon me-2">
                    <img class="img-fluid" src="http://localhost/LOGIN-MODERNO/resources/img/pixelcut-export.png" style="width: 50px; height: auto;" />
                </div>
                <h1 class="text-white fw-bold">Consulta de Peticiones</h1>
            </div>
            @csrf
            <div class="mb-3">
                <label for="id" class="form-label text-white">Número de la Petición</label>
                <input type="text" name="id" id="id" class="form-control"
                    placeholder="Introduce el número de tu petición" value="{{ old('id') }}" required>
            </div>

            <button type="submit" class="btn btn-outline-success mt-3"><i class="fa-solid fa-magnifying-glass"> Buscar</i></button>
            <a href="{{ route('pqr.registrar') }}" class="btn btn-outline-danger mt-3"><i class="fa-solid fa-arrow-left"> Volver</i></a>
        </form>

        <!-- Mostrar resultados si existen -->
        @if (isset($peticiones))
            <div class="bg-gradient-primary shadow p-4 rounded-lg mt-4">
                <h3 class="text-primary">Resultado:</h3>

                <!-- Nombre Completo -->
                <div class="mb-3">
                    <label for="nombreCompleto" class="form-label text-white">Nombre Completo</label>
                    <input type="text" id="nombreCompleto" class="form-control" value="{{ $peticiones->nombreCompleto }}"
                        readonly>
                </div>

                <!-- Tipo de Petición -->
                <div class="mb-3">
                    <label for="tipoPeticion" class="form-label text-white">Tipo de Petición</label>
                    <input type="text" id="tipoPeticion" class="form-control" value="{{ $peticiones->tipoPeticion }}"
                        readonly>
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label text-white">Descripción</label>
                    <input type="text" id="descripcion" class="form-control" value="{{ $peticiones->descripcion }}"
                        readonly>
                </div>

                <!-- Respuesta -->
                <div class="mb-3">
                    <label for="respuesta" class="form-label text-white">Respuesta</label>
                    <input type="text" id="respuesta" class="form-control" value="{{ $peticiones->respuesta }}" readonly>
                </div>
            </div>
        @endif
    </div>
@endsection
