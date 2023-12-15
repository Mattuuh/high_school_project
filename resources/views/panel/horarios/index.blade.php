@extends('adminlte::page')
@section('plugins.Datatables', true)
@section('title', 'Horarios')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @can('ver_admin')
        <div class="col-6">
            <div class="row">
                <div class="col-1">
                    <label for="filtro" class="fs-1">Curso: </label>
                </div>
                <div class="col-3">
                    <select id="filtro" class="form-control">
                        <option value="0">-- Seleccionar --</option>
                        @foreach ($cursos as $curso)
                            <option value="{{ $curso->id }}">{{ $curso->nombre }} {{ $curso->division }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-1">
                    <button id="consultar" class="btn btn-success">Consultar</button>
                </div>
    
            </div>            
            
        </div>
        {{-- <a href="{{ route('horarios.create') }}" class="btn btn-success">Crear nuevo horario</a> --}}
    @endcan
        
    @if ($horarios->count())
        {{-- <table class="table table-striped mt-1" id='tabla-horarios'>
            <thead class="table-dark">
                <tr>
                    <th>Hora</th>
                    <th>Inicio</th>
                    <th>Fin</th>                    
                    <th>Docente</th>
                    <th>Materia</th>
                    <th>Curso</th>
                    <th>Division</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->horas->hora }}</td>
                        <td>{{ $horario->horas->hora_inicio }}</td>
                        <td>{{ $horario->horas->hora_fin }}</td>
                        <td>{{ $horario->empleados->nombre }} {{ $horario->empleados->apellido }}</td>
                        <td>{{ $horario->materias->nom_materia }}</td>
                        <td>{{ $horario->cursos->nombre }}</td>
                        <td>{{ $horario->cursos->division }}</td>
                        <td>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-dato='{{ $horario }}'>
                                Ver
                            </button>
                            <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-primary btn-sm">Editar</a>
                            <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $horario->id }}" data-nombre="{{ $horario->mes }}">
                                Eliminar
                            </button>
                        </td>       
                    </tr>
                @endforeach
                    
            </tbody>
        </table> --}}
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Hora</th>
                    <th scope="col">Lunes</th>
                    <th scope="col">Martes</th>
                    <th scope="col">Miércoles</th>
                    <th scope="col">Jueves</th>
                    <th scope="col">Viernes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($horariosAgrupados as $hora => $dias)
                    <tr>
                        <td>{{-- {{ $hora }} <br>  --}}{{ $dataHora[$hora]['hora_inicio'] }} - {{ $dataHora[$hora]['hora_fin'] }}</td>
                        @for ($i = 1; $i <= 5; $i++) 
                            <td>
                                @if (isset($dias[$i]))
                                    {{ $dias[$i]['materia'] }} <br>
                                    {{ $dias[$i]['docente'] }}
                                @endif
                            </td>
                        @endfor
                    </tr>
                @endforeach
            </tbody>
        </table>
       @include('panel.horarios.modals')
    @else
        <h4>No hay horario cargado!</h4>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.5.0/js/responsive.bootstrap4.min.js"></script>

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/horarios.js') }}"></script>
    
    <script>
        $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');
                console.log(data);
                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Horario #' + data.id);

                $('#hora').text(data.horas.hora);
                $('#hora_inicio').text(data.horas.hora_inicio);
                $('#hora_fin').text(data.horas.hora_fin);
                $('#docente').text(data.empleados.nombre_emp +" "+data.empleados.apellido_emp);
                $('#materia').text(data.materias.nom_materia);
                $('#grado').text(data.cursos.grado);
                $('#division').text(data.cursos.division);
                        
                //$('#creado').text(data.created_at);
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