@extends('adminlte::page')

@section('plugins.Datatables', true)

@can('registro-pago')
    @section('title', 'Registro de pagos')
    @section('content_header')
    <h1>Lista de alumnos y cuotas</h1>
    @stop
@elsecan('registro-alumno')
    @section('title', 'Registro de alumnos')
    @section('content_header')
    <h1>Lista de Alumnos</h1>
    @stop
@endcan

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-12 mb-3">
        {{-- @can('registro-alumno') --}}
            <a href="{{ route('alumnos.create') }}" class="btn btn-success text-uppercase">
                Nuevo alumno
            </a>
        {{-- @endcan --}}
    </div>
        {{-- <a href="{{ route('alumnos.create') }}" class="btn btn-success">Agregar nuevo pago</a> --}}
    @if ($alumnos->count())
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped mt-1" id="tabla-alumnos">
                    <thead class="table-dark">
                        <tr>
                            <th>Legajo</th>
                            <th>Nombre y Apellido</th>
                            <th>Dni</th>
                            <th>Domicilio</th>
                            {{-- <th>Cuota</th> --}}
                            <th>Acciones</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{ $alumno->id }}</td>
                                <td>{{ $alumno->nombre_alu }} {{ $alumno->apellido_alu }}</td>
                                <td>{{ $alumno->dni_alu }}</td>
                                <td>{{ $alumno->domicilio_alu }}</td>
                                {{-- @can('registro-pago')
                                <td>{{ $alumno->cuota }}</td>
                                @endcan --}}
                                <td>
                                    <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-alu="{{ $alumno }}">
                                        Ver
                                    </button>                            
                                    <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-dark btn-sm">Editar</a>
                                    <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase" data-toggle="modal" data-target="#deleteModal" data-id="{{ $alumno->id }}" data-nombre="{{ $alumno->nombre_alu }}">
                                        Eliminar
                                    </button>
                                    {{-- <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('panel.alumnos.modals')        
            </div>
        </div>
    </div>
    @else
        <h4>No hay alumnos cargados!</h4>
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
    <script src="{{ asset('js/alumnos.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var alumnoData = button.data('bs-alu');
    
                $('#modalTitle').text('Ficha de alumno #' + alumnoData.id);
                $('#nombre').text(alumnoData.nombre_alu);
                $('#apellido').text(alumnoData.apellido_alu);
                $('#dni').text(alumnoData.dni_alu);
                $('#domicilio').text(alumnoData.domicilio_alu);
                $('#telefono').text(alumnoData.telefono_alu);
                $('#email').text(alumnoData.email_alu);
                $('#fecha_ingreso').text(alumnoData.fecha_ingreso_alu);
                $('#fecha_egreso').text(alumnoData.fecha_egreso_alu);
            });
        });
    </script>
    <script>
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/alumnos/${id}`);
                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el alumno "${nombre}"?`)
            })
        });
    </script>
@stop