@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2>Crear Nueva Meta</h2>
        <form action="{{ route('metas.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" required>
            </div>
            <div class="mb-3">
                <label for="encargado" class="form-label">Encargado</label>
                <select class="form-select" id="encargado" name="encargado" required>
                    <option value="">Seleccione un encargado</option>
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}">
                            {{ $empleado->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Meta</button>
            <a href="{{ route('metas.index') }}" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
@endsection
