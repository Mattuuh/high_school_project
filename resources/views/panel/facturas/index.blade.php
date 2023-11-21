@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Facturas')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('facturas.create') }}" class="btn btn-success">Agregar nuevo pago</a>
    @if ($facturas->count())
        <div class="col-12">
            <?php //var_dump($facturas);die; ?>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1 nowrap w-100" id="tabla-facturas">
                        <thead class="table-dark">
                            <tr>
                                <th>Legajo</th>
                                <th>Nombre y Apellido</th>
                                <th>Dni</th>
                                <th>Domicilio</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Tipo de empleado</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Egreso</th>
                                <th>Acciones</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($facturas as $empleado)
                                <tr>
                                    <td>{{ $empleado->legajo_emp }}</td>
                                    <td>{{ $empleado->nombre_emp }} {{ $empleado->apellido_emp }}</td>
                                    <td>{{ $empleado->dni_emp }}</td>
                                    <td>{{ $empleado->domicilio_emp }}</td>
                                    <td>{{ $empleado->telefono_emp }}</td>
                                    <td>{{ $empleado->email_emp }}</td>
                                    <td>{{ $empleado->tipo_empleado->nombre_te }}</td>
                                    <td>{{ $empleado->fecha_ingreso_emp }}</td>
                                    <td>{{ $empleado->fecha_egreso_emp }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-id="{{ $empleado->legajo_emp }}" data-nombre="{{ $empleado->nombre_emp }}">
                                            Ver
                                        </button>
                                        <a href="{{ route('facturas.edit', $empleado->legajo_emp) }}" class="btn btn-dark btn-sm">Editar</a>
                                        <form action="{{ route('facturas.destroy', $empleado->legajo_emp) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.facturas.modals')
                </div>
            </div>    
        </div>
    @else
        <h4>No hay facturas cargados!</h4>
    @endif
@endsection


{{-- Importacion de Archivos CSS --}}
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap4.min.css">
@stop


{{-- Importacion de Archivos JS --}}
@section('js')
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/empleados.js') }}"></script>
@stop