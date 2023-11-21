@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Empleados')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('empleados.create') }}" class="btn btn-success">Agregar nuevo empleado</a>
    <a href="{{ route('exportar-empleados-pdf') }}" class="btn btn-danger" title="PDF" target="_blank">
        <i class="fas fa-file-pdf"></i> PDF
    </a>
    <a href="{{ route('exportar-empleados-excel') }}" class="btn btn-info" title="Excel" target="_blank">
        <i class="fas fa-file-excel"></i> Excel
    </a>
    @if ($empleados->count())
        <div class="col-12">
            <?php //var_dump($empleados);die; ?>
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1 nowrap w-100" id="tabla-empleados">
                        <thead class="table-dark">
                            <tr>
                                <th>Legajo</th>
                                <th>Nombre y Apellido</th>
                                <th>Dni</th>
                                <th>Foto</th>
                                <th>Tipo de empleado</th>
                                <th>Acciones</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->legajo_emp }}</td>
                                    <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                                    <td>{{ $empleado->dni }}</td>
                                    <td><?php  echo $empleado->imagen != '' ? '<img src="'.$empleado->imagen.'" alt="'.$empleado->nombre.'" class="img-fluid" style="width: 80px;">' : '-' ?></td>
                                    <td>{{ $empleado->tipo_empleado->nombre_te }}</td>
                                    <td>
                                        {{-- <a class="btn btn-success btn-sm" href="{{ route('empleados.show', $empleado->legajo_emp) }}">Ver</a> --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-emp="{{ $empleado }}">
                                            Ver
                                        </button>
                                        <a href="{{ route('empleados.edit', $empleado->legajo_emp) }}" class="btn btn-dark btn-sm">Editar</a>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $empleado->legajo_emp }}" data-nombre="{{ $empleado->nombre }}">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.empleados.modals')
                </div>
            </div>    
        </div>
    @else
        <h4>No hay empleados cargados!</h4>
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
        $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var empleadoData = button.data('bs-emp');
                
                // Aquí puedes acceder a los datos del empleado y hacer lo que necesites
                //console.log(empleadoData);
    
                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Ficha de Empleado con Legajo #' + empleadoData.legajo_emp);
                $('#nombre').text(empleadoData.nombre);
                $('#apellido').text(empleadoData.apellido);
                $('#dni').text(empleadoData.dni);
                $('#imagen').imagen(empleadoData.imagen);
                $('#domicilio').text(empleadoData.domicilio);
                $('#telefono').text(empleadoData.telefono);
                $('#email').text(empleadoData.email);
                $('#tipo_emp').text(empleadoData.tipo_empleado.nombre_te);
            });
        });

        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/empleados/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el empleado "${nombre}"?`)
            })
        });
    </script>
    
@stop