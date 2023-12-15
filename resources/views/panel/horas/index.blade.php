@extends('adminlte::page')

@section('title', 'Horas')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <a href="{{ route('horas.create') }}" class="btn btn-success">Añadir nuevo modulo</a>

    @if ($horas->count())
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped mt-1" id="tabla-horas">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Modulo</th>
                            <th>Hora inicio</th>
                            <th>Hora fin</th>
                            <th>Acciones</th>
                        </tr>    
                    </thead>
                    <tbody>
                        @foreach ($horas as $hora)
                            <tr>
                                <td>{{ $hora->id }}</td>
                                <td>{{ $hora->hora }}</td>
                                <td>{{ $hora->hora_inicio }}</td>
                                <td>{{ $hora->hora_fin }}</td>
                                <td>
                                    <a href="{{ route('horas.edit', $hora->id) }}" class="btn btn-dark btn-sm">Editar</a>
                                    <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $hora->id }}" data-nombre="{{ $hora->hora }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('panel.horas.modals')
            </div>
        </div>
    </div>
    @else
        <h4>No hay horas cargadas!</h4>
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
    <script src="{{ asset('js/horas.js') }}"></script>
    <script>
        $(document).ready(function(){

        $('#deleteModal').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget) // Button that triggered the modal
            const id = button.data('id') // Extract info from data-* attributes
            const nombre = button.data('nombre') // Extract info from data-* attributes
            
            const modal = $(this)
            const form = $('#formDelete')
            form.attr('action', `{{ env('APP_URL') }}/panel/materias/${id}`);

            modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el "${nombre}" modulo ?`)
        })
        });
    </script>
@stop