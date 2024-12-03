@extends('layouts.app')

@section('title', 'Tables Page')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Tabla de Metas</h3>
        </div>

        {{-- Botón para Crear Meta (solo para Admin) --}}
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('metas.create') }}" class="btn btn-success m-3"><i class="fa-solid fa-plus"></i> Crear Meta</a>
        @endif

        {{-- Inicio del content de la tabla --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Encargado</th>
                            <th>Estado</th>
                            <th>Prueba</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha Completada</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Descripción</th>
                            <th>Encargado</th>
                            <th>Estado</th>
                            <th>Prueba</th>
                            <th>Fecha de Creación</th>
                            <th>Fecha Completada</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($metas as $meta)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $meta->descripcion }}</td>
                                <td>
                                    @if ($meta->encargado_name)
                                        {{ $meta->encargado_name }}
                                    @else
                                        No asignado
                                    @endif
                                </td>
                                <td>{{ ucfirst($meta->estado) }}</td>
                                <td>
                                    @if ($meta->url)
                                        <button class="btn btn-info mr-3 ver-prueba" data-url="{{ asset($meta->url) }}">
                                            Ver prueba
                                        </button>
                                    @else
                                        No disponible
                                    @endif
                                </td>
                                <td>{{ $meta->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if ($meta->fecha_completada)
                                        {{ $meta->fecha_completada->format('d/m/Y H:i') }}
                                    @else
                                        No completada
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    @if (Auth::user()->role === 'admin')
                                        <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-primary mr-3">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <form id="delete-form-{{ $meta->id }}"
                                            action="{{ route('metas.destroy', $meta->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger delete-button"
                                                data-id="{{ $meta->id }}">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @endif
                                    @if (Auth::user()->role === 'employee')
                                        <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-primary mr-3">
                                            Completar
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal para mostrar la imagen -->
    <div class="modal fade" id="modalPrueba" tabindex="-1" aria-labelledby="modalPruebaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPruebaLabel">Evidencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <img id="imagenPrueba" src="" alt="Evidencia" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botonesVerPrueba = document.querySelectorAll('.ver-prueba');
            const modal = new bootstrap.Modal(document.getElementById('modalPrueba'));
            const imagenPrueba = document.getElementById('imagenPrueba');

            botonesVerPrueba.forEach(boton => {
                boton.addEventListener('click', function() {
                    const url = this.dataset.url;
                    imagenPrueba.src = url;
                    modal.show();
                });
            });
        });
    </script>
@endsection
