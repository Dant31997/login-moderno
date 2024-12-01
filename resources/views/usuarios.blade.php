@extends('layouts.app')

@section('title', 'Tables Page')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary ">Tabla Empleados</h3>
        </div>

        {{-- Botón para abrir el modal de registrar --}}
        <button type="button" class="btn btn-success m-3" data-toggle="modal" data-target="#RegistrarModal">
            <i class="fa-solid fa-plus"></i> Crear empleado
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
                                <input type="text" id="name" name="name" class="form-control" required
                                    autocomplete="name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required
                                    autocomplete="email">
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña</label>
                                <div class="input-group">
                                    <input type="password" id="password" name="password" class="form-control" required minlength="8" autocomplete="new-password" 
                                           placeholder="Ingrese su contraseña">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-eye show-password" id="togglePassword"></i>
                                        </span>
                                    </div>
                                </div>
                                <small id="passwordHelp" class="form-text text-muted">La contraseña debe tener al menos 8 caracteres.</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="password_confirmation">Confirmar Contraseña</label>
                                <div class="input-group">
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required 
                                           minlength="8" autocomplete="new-password" placeholder="Confirme su contraseña">
                                    <div class="input-group-append">
                                        <span class="input-group-text">
                                            <i class="fa-solid fa-eye show-password" id="toggleConfirmPassword"></i>
                                        </span>
                                    </div>
                                </div>
                                <small id="passwordConfirmationHelp" class="form-text text-muted">Debe coincidir con la contraseña anterior.</small>
                            </div>
                            
                            <div class="form-group">
                                <label for="role">Rol</label>
                                <select id="role" name="role" class="form-control" required autocomplete="role">
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
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
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
                                <td>{{ $usuario->role === 'employee' ? 'Empleado' : $usuario->role }}</td>
                                <td class="d-flex justify-content-center align-items-center">
                                    <!-- Botón de Editar que abre el modal -->
                                    <button type="button" class="btn btn-primary mr-3" data-toggle="modal"
                                        data-target="#editModal{{ $usuario->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </button>

                                    <!-- Botón de Eliminar -->
                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');"><i
                                                class="fa-solid fa-trash"></i></button>
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
                                                <form action="{{ route('usuarios.update', $usuario->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="name">Nombre</label>
                                                            <input type="text" id="name" name="name"
                                                                class="form-control" value="{{ $usuario->name }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" id="email" name="email"
                                                                class="form-control" value="{{ $usuario->email }}"
                                                                required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="role">Rol</label>
                                                            <select id="role" name="role" class="form-control">
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
                                                        <button type="submit" class="btn btn-success">Actualizar
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
    <script src="{{ asset('assets/js/show.js') }}"></script>
@endsection
