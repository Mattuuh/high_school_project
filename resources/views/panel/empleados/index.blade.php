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
                                <th>Domicilio</th>
                                <th>Telefono</th>
                                <th>Email</th>
                                <th>Tipo de empleado</th>
                                <th>Fecha Ingreso</th>
                                <th>Fecha Egreso</th>
                                <th>Acciones</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($empleados as $empleado)
                                <tr>
                                    <td>{{ $empleado->legajo_emp }}</td>
                                    <td>{{ $empleado->nombre_emp }} {{ $empleado->apellido_emp }}</td>
                                    <td>{{ $empleado->dni_emp }}</td>
                                    <td>{{ $empleado->domicilio_emp }}</td>
                                    <td>{{ $empleado->telefono_emp }}</td>
                                    <td>{{ $empleado->email_emp }}</td>
                                    <td>{{ $empleado->tipo_empleado->nombre_te }}</td>
                                    <td>{{ $empleado->fecha_ingreso_emp }}</td>
                                    <td>{{ $empleado->fecha_egreso_emp }}</td>
                                    <td>
                                        {{-- <a class="btn btn-success btn-sm" href="{{ route('empleados.show', $empleado->legajo_emp) }}">Ver</a> --}}
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-emp="{{ $empleado }}">
                                            Ver
                                        </button>
                                        <a href="{{ route('empleados.edit', $empleado->legajo_emp) }}" class="btn btn-dark btn-sm">Editar</a>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger text-uppercase" data-toggle="modal" data-target="#deleteModal" data-id="{{ $empleado->legajo_emp }}" data-nombre="{{ $empleado->nombre_emp }}">
                                            Eliminar
                                        </button>
                                        {{-- <form action="{{ route('empleados.destroy', $empleado) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        </form> --}}
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
                $('#nombre').text(empleadoData.nombre_emp);
                $('#apellido').text(empleadoData.apellido_emp);
                $('#dni').text(empleadoData.dni_emp);
                $('#domicilio').text(empleadoData.domicilio_emp);
                $('#telefono').text(empleadoData.telefono_emp);
                $('#email').text(empleadoData.email_emp);
                $('#tipo_emp').text(empleadoData.tipo_empleado.nombre_te);
                $('#fecha_ingreso').text(empleadoData.fecha_ingreso_emp);
                $('#fecha_egreso').text(empleadoData.fecha_egreso_emp);
            });
        });

        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ url('empleados') }}/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el producto "${nombre}"?`)
            })
        });
    </script>
    
@stop