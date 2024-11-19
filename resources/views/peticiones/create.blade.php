@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Petición</h1>

    <form action="{{ route('peticiones.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="tipo">Tipo</label>
            <input type="text" name="tipo" id="tipo" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" id="descripcion" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-success mt-3">Guardar</button>
    </form>
</div>
@endsection
