@extends('layouts.app')

@section('title', 'Tables Page')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary ">Tabla de PQR</h3>
        </div>
        {{-- Inicio del content de la tabla --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Responsable</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tipo</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Responsable</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($peticiones as $peticion)
                            <tr>
                                <td>{{ $peticion->id }}</td>
                                <td>{{ $peticion->tipoPeticion }}</td>
                                <td>{{ Str::limit($peticion->descripcion, 50) }}</td>
                                <!-- Muestra solo los primeros 50 caracteres -->
                                <td>{{ $peticion->estado }}</td>
                                <td>{{ $peticion->responsableEmpleado ? $peticion->responsableEmpleado->name : 'No asignado' }}
                                </td>
                                <td>
                                    <!-- Botón de acción para abrir el modal -->
                                    <button class="btn btn-info" data-bs-toggle="modal"
                                        data-bs-target="#viewModal{{ $peticion->id }}">
                                        Ver Detalles
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="viewModal{{ $peticion->id }}" tabindex="-1"
                                        aria-labelledby="viewModalLabel{{ $peticion->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewModalLabel{{ $peticion->id }}">Detalles
                                                        de la Petición</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h6>Nombre:</h6>
                                                    <p>{{ $peticion->nombreCompleto }}</p>

                                                    <h6>N° de cuenta:</h6>
                                                    <p>{{ $peticion->numeroCuenta }}</p>

                                                    <h6>Correo:</h6>
                                                    <p>{{ $peticion->correo }}</p>

                                                    <h6>Celular:</h6>
                                                    <p>{{ $peticion->telefono }}</p>

                                                    <h6>Tipo:</h6>
                                                    <p>{{ $peticion->tipoPeticion }}</p>

                                                    <h6>Descripción:</h6>
                                                    <p>{{ $peticion->descripcion }}</p>

                                                    <h6>Contactar por:</h6>
                                                    <p>{{ $peticion->preferenciaContacto }}</p>

                                                    <h6>Estado:</h6>
                                                    <p>{{ $peticion->estado }}</p>

                                                    <h6>Responsable:</h6>
                                                    <p>{{ $peticion->responsable }}</p>

                                                    <h6>Fecha de Creación:</h6>
                                                    <p>{{ $peticion->created_at->format('d/m/Y H:i') }}</p>

                                                    <h6>Última Actualización:</h6>
                                                    <p>{{ $peticion->updated_at->format('d/m/Y H:i') }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <!-- Botón de Responder (Visible para ambos, admin y employee) -->
                                                    <a href="{{ route('peticiones.edit', $peticion->id) }}"
                                                        class="btn btn-success">Responder</a>

                                                    <!-- Los siguientes botones solo los verá el admin -->
                                                    @if (Auth::user()->role === 'admin')
                                                        <!-- Botón de Asignar (Solo visible para admin) -->
                                                        <a href="{{ route('peticiones.edit', $peticion->id) }}"
                                                            class="btn btn-warning">Asignar</a>

                                                        <!-- Botón de Eliminar (Solo visible para admin) -->
                                                        <form action="{{ route('peticiones.destroy', $peticion->id) }}"
                                                            method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger"
                                                                onclick="return confirm('¿Estás seguro de que quieres eliminar esta petición?')">Eliminar</button>
                                                        </form>
                                                    @endif

                                                    <!-- Botón para Cerrar el Modal (Visible para ambos, admin y employee) -->
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
