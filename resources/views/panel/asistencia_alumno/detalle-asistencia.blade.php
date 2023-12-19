@extends('adminlte::page')

@section('title', 'Registro de Asistencias')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-75 pb-2 border rounded-2 bg-light">
        <h1>Detalle de alumno</h1>
        <div class="row">
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input id="nombre" class="form-control" value="{{ $alumno->nombre }}">
                <label for="apellido" class="form-label">Apellido:</label>
                <input id="apellido" class="form-control" value="{{ $alumno->apellido }}">
                <label for="dni" class="form-label">Dni:</label>
                <input id="dni" class="form-control" value="{{ $alumno->dni }}">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <label for="resumen" class="form-label d-block ">Resumen:</label>
                <label for="presente" class="pl-2">Presente: </label> {{ $presente }}
                <label for="ausente" class="pl-2">Ausente: </label> {{ $ausente }}
                <label for="justificado" class="pl-2">Justificado: </label> {{ $justificado }}
                <label for="tarde" class="pl-2">Tarde: </label> {{ $tarde }}
                <label for="tarde" class="pl-2">Faltas:</label> {{ $inasistencia }}
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1" id="tabla-asistencia">
                        <thead class="table-dark">
                            <tr>
                                <th>Fecha</th>
                                <th>Asistencia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($asistencias as $asistencia)
                                <tr>
                                    <td>{{ $asistencia->fecha }}</td>
                                    <td><?php echo $asistencia->id_estado == null ? '-' : $asistencia->estadoAsistencia->descripcion_ea ?></td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#asistenciaDetalleEditModal" data-bs-dato="{{ $asistencia }}" data-id-estado="{{ $asistencia->id_estado }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.asistencia_alumno.modals')
                </div>
            </div>
        <a href="{{ route('asistencia_alumno.listadoalumno') }}" class="btn btn-danger text-light">Volver</a>
        </div>
        </div>
    </div>

@endsection

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
            $('#asistenciaDetalleEditModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');
                var id_estado = button.data('id-estado');

                const modal = $(this)
                const form = $('#formAsistenciaDetalle')
                form.attr('action', `{{ env('APP_URL') }}/panel/asistencia_alumno/${data.id_alumno}/${data.fecha}`);
                
                $('#fecha').val(data.fecha);
                $('input[name="id_estado"]').filter(`[value="${id_estado}"]`).prop('checked', true);
            });
        });
    </script>
@stop