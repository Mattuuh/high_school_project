@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Registro academico')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-12 mb-3">
        <a href="{{ route('registro_academico.create') }}" class="btn btn-success">Agregar nuevo </a>
    </div>
    {{-- @if ($registros->count()) --}}
    @if ($alumnos->count())
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-2 mb-2">
                        <label for="filtroSelect">Filtrar por:</label>
                        <select id="filtroSelect" class="form-control">
                            <option value="">Todos</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped mt-1" id="tabla-registro-academico">
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
                                                    {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#notasModal" data-bs-dato="{{ $alumno }}">
                                                        Registrar Nota
                                                    </button> --}}
                                                    <a href="{{ route('registro_academico.registro_nota', $alumno->id) }}" class="btn btn-success btn-sm">Registrar nota</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @include('panel.registro_academico.modals')
                            </div>
                        </div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
        <h4>No hay registros cargados!</h4>
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
    <script src="{{ asset('js/registro_academico.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#notasModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                var data = button.data('bs-dato');

                const modal = $(this)
                const form = $('#formNotas')
                form.attr('action', `{{ env('APP_URL') }}/panel/registro_academico/${data.id}`);
                $('#nombre').text(data.nombre);
                $('#apellido').text(data.apellido);
                $('#dni').text(data.dni);
                $('#id').val(data.id);

            })
        });
    </script>
    <script>
        document.getElementById('notasModal').addEventListener('click', function () {
            // Recopilar datos específicos del modal
            var datoEspecifico = "AlgunDatoEspecifico"; // Puedes obtener este dato del modal
    
            // Realizar la solicitud AJAX con datos
            $.ajax({
                url: '{{ url("/obtener-datos-modal") }}',
                type: 'POST',
                dataType: 'json',
                data: { dato: datoEspecifico }, // Enviar datos al controlador
                success: function (data) {
                    // Mostrar los datos en el cuerpo del modal
                    $('#modalBody').html(data.html);
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });
    </script>
    
@stop
