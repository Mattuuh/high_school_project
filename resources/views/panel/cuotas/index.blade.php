@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Cuotas')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    {{-- <a href="{{ route('cuotas.create') }}" class="btn btn-success">Agregar nuevo</a> --}}
    <a href="{{ route('informe-inscriptos-pdf') }}" class="btn btn-info" title="PDF" target="_blank"><i class="fas fa-file-pdf"></i> PDF Habilitados</a>
    <a href="{{ route('informe-no-inscriptos-pdf') }}" class="btn btn-info" title="PDF" target="_blank"><i class="fas fa-file-pdf"></i> PDF Pedientes</a>
    <a href="{{ route('infrome-ins-no-inscriptos-pdf') }}" class="btn btn-info" title="PDF" target="_blank"><i class="fas fa-file-pdf"></i> PDF Habilitados y Pendientes</a>

    @if ($alumnos->count())
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1" id="tabla-cuotas">
                        <thead class="table-dark">
                            <tr>
                                <th>Legajo</th>
                                <th>Apellido y Nombre</th>
                                <th>Dni</th>
                                <th>Inscripción</th>
                                <th>Acciones</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($alumnos as $alumno)
                                <tr>
                                    <td>{{ $alumno->id }}</td>
                                    <td>{{ $alumno->apellido }} {{ $alumno->nombre }}</td>
                                    <td>{{ $alumno->dni }}</td>
                                    <td><?php echo $alumno->habilitado ? '<div class="btn btn-success" title="Habilitado"><i class="fa fa-check-square"></i> Pagado</div>' : '<div class="btn btn-danger" title="Inhabilitado"><i class="fa fa-times"></i> Pendiente</div>' ?></td>
                                    <td>
                                        @can('ver_admin')
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-dato="{{ $alumno }}">
                                            Ver
                                        </button>
                                        @endcan
                                        <a href="{{ route('cuotas.filtroalumno', $alumno->id) }}" class="btn btn-primary btn-sm">Ver Cuotas</a>
                                        @can('ver_admin')
                                        <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $alumno->id }}" data-nombre="{{ $alumno->nombre }} {{ $alumno->apellido }}">
                                            Eliminar
                                        </button>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.cuotas.modals')
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
    <script src="{{ asset('js/cuotas.js') }}"></script>
    
    <script>
        $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');
    
                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Cuota #' + data.id);
                $('#mes').text(data.mes);
                $('#monto').text(data.monto);
                $('#interes').text(data.interes);

                var fecha = new Date(data.created_at);
                var dia = fecha.getDate();
                var mes = fecha.getMonth() + 1;
                var año = fecha.getFullYear();
                var horas = fecha.getHours();
                var minutos = fecha.getMinutes();
                var fechaFormateada = dia + "/" + mes + "/" + año + " " + horas + ":" + (minutos < 10 ? '0' : '') + minutos;
                $('#creado').text(fechaFormateada);
            });
            
        });

        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/cuotas/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar la cuota "${nombre}"?`)
            })
        });
    </script>
@stop