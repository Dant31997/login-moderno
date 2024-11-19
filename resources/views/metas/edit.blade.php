@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Meta</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('metas.update', $meta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion"
                    value="{{ old('descripcion', $meta->descripcion) }}" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-select" id="estado" name="estado" required>
                    <option value="Pendiente" {{ $meta->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En proceso" {{ $meta->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="Completada" {{ $meta->estado == 'Completada' ? 'selected' : '' }}>Completada</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="encargado" class="form-label">Encargado</label>
                <select class="form-select" id="encargado" name="encargado" required>
                    <option value="">Seleccione un encargado</option>
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}" {{ $meta->encargado == $empleado->id ? 'selected' : '' }}>
                            {{ $empleado->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Meta</button>
        </form>
    </div>
@endsection
