@extends('adminlte::page')

@section('title', 'Tipos de empleado')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('tipos_empleado.create') }}" class="btn btn-success">Agregar nuevo tipo de empleado</a>
    @if ($tipos_empleado->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($tipos_empleado as $tipo_empleado)
                    <tr>
                        <td>{{ $tipo_empleado->id }}</td>
                        <td>{{ $tipo_empleado->nombre_te }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-dato="{{ $tipo_empleado }}">
                                Ver
                            </button>
                            <a href="{{ route('tipos_empleado.edit', $tipo_empleado->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $tipo_empleado->id }}" data-nombre="{{ $tipo_empleado->nombre_te }}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>No hay tipos de empleados cargados!</h4>
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
    {{-- <script src="{{ asset('js/alumnos.js') }}"></script> --}}

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
                form.attr('action', `{{ env('APP_URL') }}/panel/tipos_empleado/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el tipo de empleado "${nombre}"?`)
            })
        });
    </script>
@stop