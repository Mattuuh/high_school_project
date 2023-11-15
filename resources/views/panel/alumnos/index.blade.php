@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Alumnos')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-12 mb-3">
        @can('registro-alumno')
            <a href="{{ route('alumno.create') }}" class="btn btn-success text-uppercase">
                Nuevo alumno
            </a>
        @endcan
    </div>
        <a href="{{ route('alumnos.create') }}" class="btn btn-success">Agregar nuevo pago</a>
    @if ($alumnos->count())
        <table class="table table-striped mt-1" id="tabla-alumnos">
            <thead class="table-dark">
                <tr>
                    <th>Legajo</th>
                    <th>Nombre y Apellido</th>
                    <th>Dni</th>
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
                        {{-- @can('registro-pago')
                        <td>{{ $alumno->cuota }}</td>
                        @endcan --}}
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-dato="{{ $alumno }}">
                                Ver
                            </button>
                            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $alumno->id }}" data-nombre="{{ $alumno->nombre_alu }} {{ $alumno->apellido_alu }}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @include('panel.alumnos.modals')
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
                var data = button.data('bs-dato');
    
                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Alumno #' + data.id);
                $('#nombre').text(data.nombre_alu);
                $('#apellido').text(data.apellido_alu);
                $('#dni').text(data.dni_alu);
                $('#domicilio').text(data.domicilio_alu);
                $('#telefono').text(data.telefono_alu);
                $('#email').text(data.email_alu);
            });
        });

        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/alumnos/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar la alumno "${nombre}"?`)
            })
        });
    </script>
@stop