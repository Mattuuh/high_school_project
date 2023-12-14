@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Alumnos')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-12 mb-3">
        <a href="{{ route('asistencia_alumno.listadoalumno') }}" class="btn btn-success text-uppercase">
            Listado de asistencia
        </a>
    </div>
    
    @if ($alumnos->count())
    
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-2">
                        <label for="filtroSelect">Filtrar por:</label>
                        <select id="filtroSelect" class="form-control">
                            <option value="">Todos</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('asistencia_alumno.guardar_datos') }}" method="POST">
                    @csrf
                    <table class="table table-striped mt-1" id="tabla-alumnos">
                        <thead class="table-dark">
                            <tr>
                                <th>Legajo</th>
                                <th>Nombre y Apellido</th>
                                <th>Dni</th>
                                <th>Curso</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <td>{{ $alumno->id }}</td>
                                    <td>{{ $alumno->nombre }} {{ $alumno->apellido }}</td>
                                    <td>{{ $alumno->dni }}</td>
                                    <td><?php echo $alumno->curso == null ? '-' : $alumno->curso->nombre.' '.$alumno->curso->division ?></td>
                                    <td>
                                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#showModal" data-bs-dato="{{ $alumno }}">
                                            Ver
                                        </button>
                                        <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-dark btn-sm">Editar</a>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal"
                                            data-target="#deleteModal" data-id="{{ $alumno->id }}"
                                            data-nombre="{{ $alumno->nombre }} {{ $alumno->apellido }}">
                                            Eliminar
                                        </button> --}}
                                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#asistenciaModal" data-bs-dato="{{ $alumno }}">
                                            Asistencia
                                        </button> --}}
                                        <input type="radio" id="presente" name="seleccion[{{ $alumno->id }}]" value="1"> <label for="presente">Presente</label>
                                        <input type="radio" id="ausente" name="seleccion[{{ $alumno->id }}]" value="2"> <label for="ausente">Ausente</label>
                                        <input type="radio" id="tarde" name="seleccion[{{ $alumno->id }}]" value="4"> <label for="tarde">Tarde</label>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end mt-2">
                        <button type="submit" class="btn btn-success btn-lg">Guardar</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
        @include('panel.asistencia_alumno.modals')
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
    <script src="{{ asset('js/asistencia_alumno.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');

                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Alumno #' + data.id);
                $('#nombre').text(data.nombre);
                $('#apellido').text(data.apellido);
                $('#dni').text(data.dni);
                $('#domicilio').text(data.domicilio = '' ? '-' : data.domicilio);
                $('#telefono').text(data.telefono);
                $('#email').text(data.email);
            });
        });

        $(document).ready(function() {

            $('#asistenciaModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                var data = button.data('bs-dato');

                const modal = $(this)
                const form = $('#formAsistencia')
                form.attr('action', `{{ env('APP_URL') }}/panel/asistencia_alumno/${data.id}`);
                $('#nombre').text(data.nombre);
                $('#apellido').text(data.apellido);
                $('#dni').text(data.dni);
                $('#id').val(data.id);

            })
        });

    </script>
@stop
