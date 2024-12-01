@extends('layouts.app')

@section('title', 'BancApp')

@section('content')
    @php
        use App\Http\Controllers\DashboardController;
        use App\Http\Controllers\PeticioneswController;
    @endphp
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Bienvenido, {{ Auth::user()->name }}</h1>
        </div>
        <div class="row">
            @if (Auth::user()->role === 'admin')
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Ganancias Anuales
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$216,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-receipt fa-2x text-gray-300"></i></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Ganancias Anuales
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$216,000</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">PQRs pendientes por asignar
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $conteo }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Earnings (Monthly) Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Metas sin completar
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $conteoM }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-calendar-check fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        @endif
        @if (Auth::user()->role === 'employee')
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Metas asignadas
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $conteoM }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    PQRs pendientes</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $conteo }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header bg-warning py-3 ">
                    <h6 class="m-0 font-weight-bold text-primary text-white "> <a class="nav-link"
                            href="{{ url('/peticiones') }}">
                            <i class="fa-solid fa-headset"></i>
                            <span">PQR</span>
                        </a></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie table-responsive">
                        <table class="table" id="" width="100%" cellspacing="0">

                            <thead>
                                <tr class="card-header">
                                    <th>Tipo</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Responsable</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($peticiones as $peticion)
                                    <tr>

                                        <td>{{ $peticion->tipoPeticion }}</td>
                                        <td>{{ Str::limit($peticion->descripcion, 50) }}</td>
                                        <!-- Muestra solo los primeros 50 caracteres -->
                                        <td>{{ $peticion->estado }}</td>
                                        <td>{{ $peticion->responsableEmpleado ? $peticion->responsableEmpleado->name : 'No asignado' }}
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 bg-info">
                    <h6 class="m-0 font-weight-bold text-white"> <a class="nav-link" href="{{ url('/metas') }}">
                            <i class="fa-solid fa-list-check"></i>
                            <span>Metas</span>
                        </a></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie table-responsive">

                        <table class="table" id="" width="100%" cellspacing="0">
                            <thead>
                                <tr class="card-header">

                                    <th>Descripción</th>
                                    <th>Encargado</th>
                                    <th>Estado</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($metas as $meta)
                                    <tr>

                                        <td>{{ $meta->descripcion }}</td>
                                        <td>
                                            @if ($meta->encargado_name)
                                                {{ $meta->encargado_name }}
                                            @else
                                                No asignado
                                            @endif
                                        </td>
                                        <td>{{ ucfirst($meta->estado) }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Color System -->
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
@endsection
