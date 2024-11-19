@extends('layouts.app')

@section('title', 'Tables Page')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary ">Tabla Empleados</h6>
        </div>
        {{-- Botón para abrir el modal de registrar --}}
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#RegistrarModal">
            Crear empleado
        </button>

        {{-- Modal para registrar empleado --}}
        <div class="modal fade" id="RegistrarModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Registrar Empleado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('usuarios.store') }}" method="POST"> 
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Nombre</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <select name="role" class="form-control">
                                    <option value="employee">Empleado</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- Inicio del content de la tabla --}}
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Funciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                            <th>Funciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->email }}</td>
                                <td>{{ $usuario->role }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <!-- Botón de Editar que abre el modal -->
                                    <button type="button" class="btn btn-info mr-3" data-toggle="modal"
                                        data-target="#editModal{{ $usuario->id }}">
                                        Editar
                                    </button>

                                    <!-- Botón de Eliminar -->
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">Eliminar</button>
                                    </form>

                                    <!-- Modal para editar -->
                                    <div class="modal fade" id="editModal{{ $usuario->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel{{ $usuario->id }}" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editModalLabel{{ $usuario->id }}">Editar
                                                        Usuario</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Nombre</label>
                                                            <input type="text" name="name" class="form-control"
                                                                value="{{ $usuario->name }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" class="form-control"
                                                                value="{{ $usuario->email }}" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="role">Rol</label>
                                                            <select name="role" class="form-control">
                                                                <option value="employee"
                                                                    {{ $usuario->role == 'employee' ? 'selected' : '' }}>
                                                                    Empleado</option>
                                                                <option value="admin"
                                                                    {{ $usuario->role == 'admin' ? 'selected' : '' }}>Admin
                                                                </option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Cerrar</button>
                                                        <button type="submit" class="btn btn-primary">Actualizar
                                                            Usuario</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
