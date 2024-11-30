@extends('layouts.app')

@section('content')
    <div class="container">
        

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (Auth::user()->role === 'admin')
        <h1>Editar Meta</h1>
        <form action="{{ route('metas.update', $meta->id) }}" method="POST">
            @csrf
            @method('PUT')

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
<button type="submit" class="btn btn-success">Actualizar Meta</button>
        </form>
        @endif

        @if (Auth::user()->role === 'employee')
        <h1>Meta</h1>
        <form action="{{ route('metas.update', $meta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input readonly type="text" class="form-control" id="descripcion" name="descripcion"
                    value="{{ old('descripcion', $meta->descripcion) }}" required>
            </div>

            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select disabled  class="form-select" id="estado" name="estado" >
                    <option value="Pendiente" {{ $meta->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En proceso" {{ $meta->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                    <option value="Completada" {{ $meta->estado == 'Completada' ? 'selected' : '' }}>Completada</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="encargado" class="form-label">Encargado</label>
                <select disabled class="form-select" id="encargado" name="encargado" required>
                    <option value="">Seleccione un encargado</option>
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id }}" {{ $meta->encargado == $empleado->id ? 'selected' : '' }}>
                            {{ $empleado->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="evidencia" class="form-label">Evidencia</label>
                <p>Suba aqui la captura de pantalla que evidencie la realización de la meta.</p>
                <input  type="file" class="form-control" id="evidencia" name="evidencia"required>
            </div>
            <button type="submit" class="btn btn-success mt-3">Verificar Meta</button>
            <a href="{{ route('metas.index') }}" class="btn btn-danger mt-3">Cancelar</a>
        </form>

        @endif
    </div>
@endsection
