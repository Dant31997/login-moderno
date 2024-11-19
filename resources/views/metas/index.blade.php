@extends('layouts.app')

@section('title', 'Metas')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Metas</h2>
        @if (Auth::user()->role === 'admin')
            <a href="{{ route('metas.create') }}" class="btn btn-primary mb-3">Crear Meta</a>
        @endif
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (Auth::user()->role === 'admin')
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
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
                            <td>
                                <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
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
                        <th>Descripción</th>
                        <th>Encargado</th>
                        <th>Estado</th>
                        <th>Fecha de Creación</th>
                        <th>Fecha Completada</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
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
                            <td>{{ $meta->fecha_creacion }}</td>
                            <td>{{ $meta->fecha_completada }}</td>
                            <td>
                                <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-warning btn-sm">Completar</a>
                                <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

    </div>
@endsection
