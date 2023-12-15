@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Cursos')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('cursos.create') }}" class="btn btn-success">Agregar nuevo curso</a>
        <a href="{{ route('graficos-alumnos')}}" class="btn btn-primary" title="ChartJs">
            <i class="fas fa-chart-pie"></i>
        </a>
    @if ($cursos->count())
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1 nowrap w-100" id="tabla-empleados">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Seccion</th>
                                <th>Cupo</th>
                                <th>Disponibilidad</th>
                                <th>Orientacion</th>
                                @can('ver_secretario')
                                    <th>Acciones</th>
                                @endcan
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($cursos as $curso)
                                <tr>
                                    <td>{{ $curso->id }}</td>
                                    <td>{{ $curso->nombre }} {{ $curso->division }}</td>
                                    <td>{{ $curso->cupos }}</td>
                                    <td>{{ $curso->disponibilidad }}</td>
                                    <td>{{ $curso->periodo_lectivo->modalidad }}</td>
                                    
                                    <td>@can('ver_secretario')
                                        {{-- <button type="button" class="btn btn-success btn-sm" data-toggle="modal"
                                            data-target="#showModal" data-bs-dato="{{ $curso }}">
                                            Ver
                                        </button> --}}
                                            <a href="{{ route('cursos.edit', $curso->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                            <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal"
                                                data-target="#deleteModal" data-id="{{ $curso->id }}"
                                                data-nombre="{{ $curso->nombre }}">
                                                Eliminar
                                            </button>@endcan
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.cursos.modals')
                </div>
            </div>    
        </div>
    @else
        <h4>No hay cursos cargados!</h4>
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

    <script>
        /* $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');
    
                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Factura #' + data.id);

                var fecha = new Date(data.created_at);
                var dia = fecha.getDate();
                var mes = fecha.getMonth() + 1;
                var año = fecha.getFullYear();
                var horas = fecha.getHours();
                var minutos = fecha.getMinutes();
                var fechaFormateada = dia + "/" + mes + "/" + año + " " + horas + ":" + (minutos < 10 ? '0' : '') + minutos;
                $('#fecha').text(fechaFormateada);
                
                $('#caja').text(data.id_caja);
                $('#legajo_alu').text(data.alumno.dni);
                $('#mes').text(data.cuota.mes);
                $('#forma_pago').text(data.forma_pago.nombre);
                $('#total').text(data.total);
            });
        }); */

        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                //const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/cursos/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el curso "${id}"?`)
            })
        });
    </script>
@stop