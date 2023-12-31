@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Apertura y Cierre de Cajas')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    @if ($cajas->count())
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1 nowrap w-100" id="tabla-cajas">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Monto Inicial</th>
                                <th>Monto Final</th>
                                <th>Fecha de Apertura</th>
                                <th>Fecha de Cierre</th>
                                <th>Acciones</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($cajas as $caja)
                                <tr>
                                    <td>{{ $caja->id }}</td>
                                    <td>{{ $caja->monto_incial }}</td>
                                    <td>{{ $caja->monto_final }}</td>
                                    <td>{{ $caja->created_at }}</td>
                                    <td><?php echo $caja->closed_at == '0000-00-00 00:00:00' ? '<span class="text-danger">'.$caja->closed_at.'</span>' : $caja->closed_at ?></td>
                                    <td>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $caja->id }}">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.cajas.modals')
                </div>
            </div>    
        </div>
    @else
        <h4>No hay cajas cargadas!</h4>
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
    <script src="{{ asset('js/cajas.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');
    
                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Caja #' + data.id);
                $('#monto_inicial').text(data.monto_inicial);
                $('#monto_final').text(data.monto_final);
                $('#apertura').text(data.created_at);
                $('#cierre').text(data.closed_at);
            });
        });

        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                //const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/cajas/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar la caja "${id}"?`)
            })
        });
    </script>
@stop