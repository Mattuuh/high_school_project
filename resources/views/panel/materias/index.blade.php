@extends('adminlte::page')

@section('title', 'Materias')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('materias.create') }}" class="btn btn-success">Agregar nueva materia</a>
    @if ($materias->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Materia</th>
                    <th>Año</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                    <tr>
                        <td>{{ $materia->id }}</td>
                        <td>{{ $materia->nom_materia }}</td>
                        <td>{{ $materia->anio_materia }}</td>
                        {{-- <td>{{ $materia-> }}</td>
                        <td>{{ $materia-> }}</td> --}}
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-dato="{{ $materia }}">
                                Ver
                            </button>
                            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $materia->id }}" data-nombre="{{ $materia->nom_materia }}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>No hay materias cargadas!</h4>
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
                form.attr('action', `{{ env('APP_URL') }}/panel/materias/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar la materia "${nombre}"?`)
            })
        });
    </script>
@stop