@extends('adminlte::page')

@section('title', 'Periodos lectivo')

@section('content')
    @if(session('status'))  
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('periodos_lectivo.create') }}" class="btn btn-success">Agregar nuevo periodo lectivo</a>
    @if ($periodos_lectivo->count())
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped mt-1" id="tabla-periodo-lectivo">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Ciclo</th>
                            <th>Plan de Estudio</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($periodos_lectivo as $periodo_lectivo)
                            <tr>
                                <td>{{ $periodo_lectivo->id }}</td>
                                <td>{{ $periodo_lectivo->plan_estudio }}</td>
                                <td>{{ $periodo_lectivo->modalidad }}</td>
                                <td>{{ $periodo_lectivo->anio }}</td>
                                <td>
                                    <a href="{{ route('periodos_lectivo.edit', $periodo_lectivo->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $periodo_lectivo->id }}" data-nombre="{{ $periodo_lectivo->plan_estudio }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('panel.periodos_lectivo.modals')
            </div>
        </div>
    </div>
    @else
        <h4>No hay periodos lectivo cargados!</h4>
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
    <script src="{{ asset('js/periodos_lectivo.js') }}"></script>

    <script>
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/periodos_lectivo/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el periodo lectivo "${nombre}"?`)
            })
        });
    </script>
@stop