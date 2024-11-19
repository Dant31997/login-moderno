@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asignar petición</h1>

        <form action="{{ route('peticiones.update', $peticion->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="tipo">Tipo</label>
                <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $peticion->tipoPeticion }}"
                    readonly>
            </div>

            <div class="form-group">
                <label for="tipo">Asunto</label>
                <input type="text" name="asunto" id="asunto" class="form-control" value="{{ $peticion->asunto }}"
                    readonly>
            </div>

            <div class="form-group">
                <label for="descripcion">Descripción</label>
                <textarea name="descripcion" id="descripcion" class="form-control" readonly>{{ $peticion->descripcion }}</textarea>
            </div>

            <div class="form-group">
                <label for="encargado">Responsable</label>
                <select class="form-select" id="encargado" name="responsable" required>
                    <option value="">Seleccione un encargado</option>
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}" {{ $peticion->responsable == $empleado->id ? 'selected' : '' }}>
                            {{ $empleado->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-success mt-3">Asignar</button>
        </form>
    </div>
@endsection
