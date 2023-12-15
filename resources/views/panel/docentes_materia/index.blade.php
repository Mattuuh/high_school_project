@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Docentes')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-12 mb-3">
        <a href="{{ route('docentes_materia.create') }}" class="btn btn-success text-uppercase">
            Añadir nuevo
        </a>
    </div>
    
    @if ($docxmat->count())
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped mt-1" id="tabla-docxmat">
                    <thead class="table-dark">
                        <tr>
                            <th>Id</th>
                            <th>Docente</th>
                            <th>Materia</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($docxmat as $dxm)
                            <tr>
                                <td>{{ $dxm->id }}</td>
                                <td>{{ $dxm->docentes->nombre }} {{ $dxm->docentes->apellido }}</td>
                                <td>{{ $dxm->materias->nom_materia }}</td>
                                <td>
                                    <a href="{{ route('docentes_materia.edit', $dxm->id) }}" class="btn btn-primary btn-sm">Editar</a>
                                    <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal"
                                        data-target="#deleteModal" data-id="{{ $dxm->id }}"
                                        data-nombre="{{ $dxm->docentes->nombre }} {{ $dxm->docentes->apellido }}">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @include('panel.docentes_materia.modals')
            </div>
        </div>
    </div>
    @else
        <h4>No hay docentes cargados!</h4>
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
    <script src="{{ asset('js/docentes_materia.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#deleteModal').on('show.bs.modal', function(event) {
                const button = $(event.relatedTarget) // Button that triggered the modal
                const id = button.data('id') // Extract info from data-* attributes
                const nombre = button.data('nombre') // Extract info from data-* attributes

                const modal = $(this)
                const form = $('#formDelete')
                form.attr('action', `{{ env('APP_URL') }}/panel/docentes_materia/${id}`);

                modal.find('.modal-body p#message').text(`¿Estás seguro de eliminar el docente "${nombre}"?`)
            })
        });

    </script>
@stop
