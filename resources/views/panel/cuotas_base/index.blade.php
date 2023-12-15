@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Cuotas')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <a href="{{ route('cuotasbase.create') }}" class="btn btn-success">Agregar nueva cuota</a>

    @if ($cuotas->count())
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1" id="tabla-cuotas">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Mes</th>
                                <th>Monto</th>
                                <th>Interes</th>
                                <th>Acciones</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($cuotas as $cuota)
                                <tr>
                                    <td>{{ $cuota->id }}</td>
                                    <td>{{ $cuota->mes }}</td>
                                    <td>{{ $cuota->monto }}</td>
                                    <td>{{ $cuota->interes }}</td>
                                    <td>
                                        <a href="{{ route('cuotasbase.edit', $cuota->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $cuota->id }}" data-nombre="{{ $cuota->mes }}">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.cuotas_base.modals')
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
        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/cuotas_base/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar la cuota "${nombre}"?`)
            })
        });
    </script>
@stop