@extends('adminlte::page')

@section('title', 'Estados de asistencia')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('estados_asistencia.create') }}" class="btn btn-success">Agregar nuevo</a>
    @if ($estados_asistencia->count())
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped mt-1" id="tabla-estados-asistencia">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($estados_asistencia as $estado_asistencia)
                            <tr>
                                <td>{{ $estado_asistencia->id }}</td>
                                <td>{{ $estado_asistencia->descripcion_ea }}</td>
                                <td>
                                    <a href="{{ route('estados_asistencia.edit', $estado_asistencia->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $estado_asistencia->id }}" data-nombre="{{ $estado_asistencia->descripcion_ea }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('panel.estados_asistencia.modals')
            </div>
        </div>
    </div>
    @else
        <h4>No hay estado de asistencia cargados!</h4>
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
    <script src="{{ asset('js/estados_asistencia.js') }}"></script>

    <script>
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/estados_asistencia/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el estado "${nombre}"?`)
            })
        });
    </script>
@stop