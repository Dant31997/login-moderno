@extends('layouts.app')

@section('title', 'Tables Page')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary ">Tabla de Metas</h3>
        </div>

        {{-- Botón para Crear Meta (solo para Admin) --}}
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('metas.create') }}" class="btn btn-success m-3">Crear Meta</a>
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
                                <td>{{ $meta->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    @if ($meta->fecha_completada)
                                        {{ $meta->fecha_completada->format('d/m/Y H:i') }}
                                    @else
                                        No completada
                                    @endif
                                </td>
                                <td class="d-flex justify-content-center align-items-center">
                                    {{-- Botón para Editar --}}
                                    @if (Auth::user()->role === 'admin')
                                    <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-info mr-3 " ><i class="fa-solid fa-pen-to-square"></i></a>
                                    {{-- Botón para Eliminar --}}
                                    <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('¿Estás seguro de eliminar esta meta?');"><i class="fa-solid fa-trash"></i></button>
                                    </form> 
                                    @endif
                                    @if (Auth::user()->role === 'employee')
                                    <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-primary mr-3">Completar</a>
                                    @endif

                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
