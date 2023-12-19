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
                            <option value="{{ $curso->id }}">{{ $curso->nombre }} {{ $curso->division }} - {{ $curso->periodo_lectivo->modalidad }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <button id="consultar" class="btn btn-success" onclick="consultarHorario()">Consultar</button>
                </div>
                <div class="col-3">
                    <a id="pdf-horario" class="btn btn-danger ml-0" title="PDF" target="_blank" hidden>
                        <i class="fas fa-file-pdf"></i> Imprimir
                    </a>
                </div>
                <div class="col-3">
                    <a id="editar" class="btn btn-info mr-0" title="Editar" hidden>
                        <i class="fas fa-pen"></i> Editar
                    </a>
                </div>

            </div>
            
        </div>
        {{-- <a href="{{ route('horario-pdf') }}" class="btn btn-success">Crear nuevo horario</a> --}}
    @endcan
        
    @if ($horarios->count())
        <div id="resultados-horario" >
            
        </div>
       @include('panel.horarios.modals')
    @else
        <h4>No hay horarios cargado!</h4>
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
        function consultarHorario() {
            var cursoSeleccionado = $('#filtro').val();

            // Realiza la solicitud Ajax al servidor
            $.ajax({
                url: '/obtener-horario', // Reemplaza con la ruta real de tu controlador
                method: 'GET',
                data: { curso_id: cursoSeleccionado },
                success: function(data) {
                    if (data.mensaje) {
                        $('#resultados-horario').html('<p>' + data.mensaje + '</p>');
                        $('#pdf-horario').attr('hidden', 'hidden');
                        $('#editar').attr('hidden', 'hidden');
                    } else {
                        $('#resultados-horario').html(data);
                        $('#pdf-horario').attr('href',`{{ env('APP_URL') }}/panel/horarios/horario-pdf/${cursoSeleccionado}`);
                        $('#pdf-horario').removeAttr('hidden');
                        $('#editar').attr('href',`{{ env('APP_URL') }}/panel/horarios/${cursoSeleccionado}/edit`);
                        $('#editar').removeAttr('hidden');
                    }
                },
                error: function(error) {
                    console.error(error);
                }
            });
        }
    </script>