@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Listado de Peticiones</h1>
    @if (Auth::user()->role === 'admin')
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peticiones as $peticion)
                <tr>
                    <td>{{ $peticion->id }}</td>
                    <td>{{ $peticion->tipoPeticion }}</td>
                    <td>{{ Str::limit($peticion->descripcion, 50) }}</td> <!-- Muestra solo los primeros 50 caracteres -->
                    <td>{{ $peticion->estado }}</td>
                    <td>{{ $peticion->responsableEmpleado ? $peticion->responsableEmpleado->name : 'No asignado' }}</td>
                    <td>
                        <!-- Botón de acción para abrir el modal -->
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{ $peticion->id }}">
                            Ver Detalles
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="viewModal{{ $peticion->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $peticion->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel{{ $peticion->id }}">Detalles de la Petición</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <!-- Botón de Editar -->
                                        <a href="{{ route('peticiones.edit', $peticion->id) }}" class="btn btn-warning">Asignar</a>

                                        <!-- Botón de Eliminar -->
                                        <form action="{{ route('peticiones.destroy', $peticion->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta petición?')">Eliminar</button>
                                        </form>

                                        <!-- Botón para Cerrar el Modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
    @if (Auth::user()->role === 'employee')
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Responsable</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peticiones as $peticion)
                <tr>
                    <td>{{ $peticion->id }}</td>
                    <td>{{ $peticion->tipoPeticion }}</td>
                    <td>{{ Str::limit($peticion->descripcion, 50) }}</td> <!-- Muestra solo los primeros 50 caracteres -->
                    <td>{{ $peticion->estado }}</td>
                    <td>{{ $peticion->responsableEmpleado ? $peticion->responsableEmpleado->name : 'No asignado' }}</td>
                    <td>
                        <!-- Botón de acción para abrir el modal -->
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#viewModal{{ $peticion->id }}">
                            Ver Detalles
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="viewModal{{ $peticion->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $peticion->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel{{ $peticion->id }}">Detalles de la Petición</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                        <!-- Botón de Editar -->
                                        <a href="{{ route('peticiones.edit', $peticion->id) }}" class="btn btn-warning">Responder</a>

                                        <!-- Botón para Cerrar el Modal -->
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
</div>

<!-- Asegúrate de incluir el script de Bootstrap al final de tu archivo -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
@endsection
