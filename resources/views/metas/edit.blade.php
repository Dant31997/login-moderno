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
                <a href="{{ route('metas.index') }}" class="btn btn-danger">Cancelar</a>
            </form>
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    @if (session('success'))
                        Swal.fire({
                            icon: 'success',
                            title: '¡Éxito!',
                            text: 'Meta actualizada con éxito',
                            timer: 3000, // Cierra automáticamente después de 3 segundos
                            showConfirmButton: false
                        });
                    @endif
                });
            </script>
        @endif

        @if (Auth::user()->role === 'employee')
            <h1>Subir Evidencia</h1>
            <form action="{{ route('metas.submitEvidence', $meta->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <input readonly type="text" class="form-control" id="descripcion" name="descripcion"
                        value="{{ old('descripcion', $meta->descripcion) }}" required>
                </div>

                <div class="mb-3">
                    <label for="estado" class="form-label">Estado</label>
                    <select disabled class="form-select" id="estado" name="estado">
                        <option value="Pendiente" {{ $meta->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="En proceso" {{ $meta->estado == 'En proceso' ? 'selected' : '' }}>En proceso
                        </option>
                        <option value="Completada" {{ $meta->estado == 'Completada' ? 'selected' : '' }}>Completada
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="evidencia" class="form-label">Evidencia</label>
                    <input type="file" accept="image/*" class="form-control" id="file" name="file" required>
                    @error('file')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success mt-3">Verificar Meta</button>
                <a href="{{ route('metas.index') }}" class="btn btn-danger mt-3">Cancelar</a>
            </form>
        @endif

    </div>
@endsection
