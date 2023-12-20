@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Facturas')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    
    
    @if ($caja != null)
        @if ($caja->closed_at->format('Y-m-d') == '1900-01-01')
            <a href="{{ route('cajas.create') }}" class="btn btn-success" hidden>Abrir caja</a>
            <a href="{{ route('facturas.create') }}" class="btn btn-success">Agregar nuevo pago</a>
            <a href="{{ route('cajas.close', $caja->id) }}" class="btn btn-danger">Cerrar caja</a>
            
        @elseif ($caja->closed_at->format('Y-m-d') != '1900-01-01')
            <div class="alert alert-danger">
                Caja cerrada!
            </div>
        @endif
    @else
        <div class="alert alert-danger">
            Se necesita abrir la caja!
        </div>
        <a href="{{ route('cajas.create') }}" class="btn btn-success">Abrir caja</a>
    @endif
    
    @if ($facturas->count())
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1 nowrap w-100" id="tabla-facturas">
                        <thead class="table-dark">
                            <tr>
                                <th>Id</th>
                                <th>Fecha de Pago</th>
                                <th>Caja</th>
                                <th>Detalle</th>
                                <th>Alumno</th>
                                <th>Forma de Pago</th>
                                <th>Total</th>
                                <th>Acciones</th>
                            </tr>    
                        </thead>
                        <tbody>
                            @foreach ($facturas as $factura)
                                <tr>
                                    <td>{{ $factura->id }}</td>
                                    <td>{{ $factura->created_at }}</td>
                                    <td>{{ $factura->caja->id }}</td>
                                    <td>{{ $factura->cuota->mes }}</td>
                                    <td>{{ $factura->alumno->dni }} </td>
                                    <td>{{ $factura->forma_pago->nombre }}</td>
                                    <td>{{ $factura->total }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-dato="{{ $factura }}">
                                            Ver
                                        </button>
                                        <a href="{{ route('factura-pdf', $factura->id) }}" class="btn btn-danger" title="PDF" target="_blank">
                                            <i class="fas fa-file-pdf"></i>
                                        </a>
                                        <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $factura->id }}">
                                            Eliminar
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.facturas.modals')
                </div>
            </div>    
        </div>
    @else
        <h4>No hay facturas cargados!</h4>
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
    <script src="{{ asset('js/facturas.js') }}"></script>

    <script>
        $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#showModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');
    
                // Puedes actualizar el contenido del modal con los datos del empleado
                $('#modalTitle').text('Factura #' + data.id);

                var fecha = new Date(data.created_at);
                var dia = fecha.getDate();
                var mes = fecha.getMonth() + 1;
                var año = fecha.getFullYear();
                var horas = fecha.getHours();
                var minutos = fecha.getMinutes();
                var fechaFormateada = dia + "/" + mes + "/" + año + " " + horas + ":" + (minutos < 10 ? '0' : '') + minutos;
                $('#fecha').text(fechaFormateada);
                
                $('#caja').text(data.id_caja);
                $('#legajo_alu').text(data.alumno.dni);
                $('#mes').text(data.cuota.mes);
                $('#forma_pago').text(data.forma_pago.nombre);
                $('#total').text('$' + data.total);
            });
        });

        $(document).ready(function(){

            $('#deleteModal').on('show.bs.modal', function (event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                //const nombre = button.data('nombre') // Extract info from data-* attributes
                
                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/facturas/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar la factura "${id}"?`)
            })
        });
        
        /* $(document).ready(function () {
            // Escucha el evento de apertura del modal
            $('#abrir-caja').on('click', function (event) {
                $('#abrir-caja').hide()
                localStorage.setItem('abrir-caja', 'true');
            });

            if (localStorage.getItem('abrir-caja') === 'true') {
                $("#abrir-caja").hide();
            }
        }); */
    </script>
@stop