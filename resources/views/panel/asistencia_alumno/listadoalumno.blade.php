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
        {{-- <a href="{{ route('alumnos.create') }}" class="btn btn-success text-uppercase">
            Nuevo alumno
        </a> --}}
        <a href="{{ route('alumnos-libres-pdf', 0) }}" class="btn btn-danger" id="alumnosLibres" title="PDF" target="_blank">
            <i class="fas fa-file-pdf"></i> Alumnos libres {{-- Curso, Alumnos libre, alumnos casi libres -> formulario -> alumnos con su falta y la condicion, Imprimir o informar('email') --}}
        </a>
        <a href="{{ route('alumnos-casilibres-pdf', 0) }}" class="btn btn-warning" id="alumnosCasiLibres" title="PDF" target="_blank">
            <i class="fas fa-file-pdf"></i> Alumnos proximos a quedar libres {{-- Curso, Alumnos libre, alumnos casi libres -> formulario -> alumnos con su falta y la condicion, Imprimir o informar('email') --}}
        </a>
        <a href="{{ route('grafico-asistencia', 0) }}" class="btn btn-primary" id="alumnosInstancia" title="ChartJs">
            <i class="fas fa-chart-pie"></i> Inasistencias Alumnos {{-- Inasistencias de alumnos por curso (grafico) --}}
        </a>
    </div>
    
    @if ($asistencias->count())
        <div class="row">
            <div class="col-2">
                <label for="filtroSelect2">Filtrar curso:</label>
                <select id="filtroSelect2" class="form-control">
                    <option value="0">Todos</option>
                    @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }} "{{ $curso->division }}" - Ciclo {{ $curso->periodo_lectivo->modalidad }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-3">
                <label for="filtroFecha">Filtrar fecha:</label>
                <div class="row">
                    <div class="col-8 pr-0">
                        <input type="date" name="fecha" id="filtroFecha" class="form-control">
                    </div>
                    <div class="col-2 p-0">
                        <button type="button" class="btn btn-success" id="botonFecha"><i class='fas fa-search'></i></button>
                    </div>
                    <div class="col-2">
                        <button type="button" class="btn btn-danger" id="limpiarFiltros" title="Limpiar filtros"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-2">
                
            </div>
            <div class="col-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped mt-1" id="tabla-alumnos">
                            <thead class="table-dark">
                                <tr>
                                    <th>Legajo</th>
                                    <th>Nombre y Apellido</th>
                                    <th>Dni</th>
                                    <th>Curso</th>
                                    <th>Asistencia</th>
                                    <th>Fecha</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistencias as $asistencia)
                                    <tr>
                                        <td>{{ $asistencia->alumno->id }}</td>
                                        <td>{{ $asistencia->alumno->nombre }} {{ $asistencia->alumno->apellido }}</td>
                                        <td>{{ $asistencia->alumno->dni }}</td>
                                        <td>{{ $asistencia->alumno->curso->nombre }} {{ $asistencia->alumno->curso->division }}</td>
                                        <td><?php echo $asistencia->id_estado == null ? '-' : $asistencia->estadoAsistencia->descripcion_ea ?></td>
                                        <td>{{ $asistencia->fecha }}</td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#asistenciaEditModal" data-bs-dato="{{ $asistencia->alumno }}" data-id-estado="{{ $asistencia->id_estado }}">
                                                Editar Asistencia
                                            </button>
                                            <a href="{{ route('asistencia_alumno.detalleAsistencia', $asistencia->alumno->id) }}" class="btn btn-info btn-sm">
                                                Detalle {{-- Contador de asistencias e inasistencias y sus fechas --}}
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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
            $('#asistenciaEditModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');
                var id_estado = button.data('id-estado');

                const modal = $(this)
                const form = $('#formAsistencia')
                form.attr('action', `{{ env('APP_URL') }}/panel/asistencia_alumno/${data.id}`);
                $('#nombre').text(data.nombre);
                $('#apellido').text(data.apellido);
                $('#dni').text(data.dni);
                $('#id').val(data.id);
                $('input[name="id_estado"]').filter(`[value="${id_estado}"]`).prop('checked', true);

            });
        });

        $(document).ready(function() {

            $('#deleteModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes

                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/alumnos/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar la alumno "${nombre}"?`)
            })

            //cursoSeleccionado = $('#filtroSelect2 option').val();
            $('#filtroSelect2').on('change', function() {
                cursoSeleccionado = this.value;
                $('#alumnosLibres').attr('href',`{{ env('APP_URL') }}/panel/alumnos-libres-pdf/${cursoSeleccionado}`);
                $('#alumnosCasiLibres').attr('href',`{{ env('APP_URL') }}/panel/alumnos-casilibres-pdf/${cursoSeleccionado}`);
                $('#alumnosInstancia').attr('href',`{{ env('APP_URL') }}/panel/grafico-asistencia/${cursoSeleccionado}`);
            });
        });

    </script>
@stop
