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
    @if ($registros->count())
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1 nowrap w-100" id="tabla-empleados">
                        <thead class="table-dark">
                            <tr>
                               
                                <th>Nombre y Apellido</th>
                                <th>Dni</th>
                                <th>Asignatura</th>
                                <th>Docente</th>
                                <th>Nota</th>
                                <th>Instancia</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($registros as $registro)
                                <tr>
                                    
                                    <td>{{ $registro->alumno->nombre }} {{ $registro->alumno->apellido }}</td>
                                    <td>{{ $registro->alumno->dni }}</td>
                                    <td>{{ $registro->asignaturas->materias->nom_materia }}</td>
                                    <td>{{ $registro->asignaturas->empleados->nombre }}</td>
                                    <td>{{ $registro->nota }}</td>
                                    <td>{{ $registro->instancia->descripcion }}</td>
                                   
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.registro_academico.modals')
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
    </script>
    <script>
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                console.log(id, nombre)
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/registro_academico/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el registro "${nombre}"?`)
            })
        });
    </script>
    
@stop
