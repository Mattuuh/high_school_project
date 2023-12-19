@extends('adminlte::page')

@section('title', 'Notas de Alumno')

@section('content')
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-75 pb-2 border rounded-2 bg-light">
        <h1>Detalle de alumno</h1>
        <div class="row">
            <div class="col-6">
                <label for="nombre" class="form-label">Nombre:</label>
                <input id="nombre" class="form-control" value="{{ $alumno->nombre }}" readonly>
                <label for="apellido" class="form-label">Apellido:</label>
                <input id="apellido" class="form-control" value="{{ $alumno->apellido }}" readonly>
                <label for="dni" class="form-label">Dni:</label>
                <input id="dni" class="form-control" value="{{ $alumno->dni }}" readonly>
            </div>
        </div>

        <div class="col-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped mt-1" id="tabla-">
                        <thead class="table-dark">
                            <tr>
                                <th>Materia</th>
                                <th>Nota</th>
                                <th>Instancia</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($registros_academico as $registro_academico)
                                <tr>
                                    <td>{{ $registro_academico->docentes_materia->materias->nom_materia }}</td>
                                    <td>{{ $registro_academico->nota }}</td>
                                    <td>{{ $registro_academico->instancia->descripcion }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#registroAcademicoModal" data-bs-dato="{{ $registro_academico }}">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @include('panel.registro_academico.modals')
                </div>
            </div>
        <a href="{{ route('registro_academico.index') }}" class="btn btn-danger text-light">Volver</a>
        </div>
        </div>
    </div>

@endsection

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
    <script src="{{ asset('js/registro_academico.js') }}"></script>

    <script>
        $(document).ready(function() {
            // Escucha el evento de apertura del modal
            $('#registroAcademicoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var data = button.data('bs-dato');

                const modal = $(this)
                const form = $('#formRegistroAcademico')
                form.attr('action', `{{ env('APP_URL') }}/panel/registro_academico/${data.id}`);
                
                $('#id').val(data.id);
                $('#materia').val(data.docentes_materia.materias.nom_materia);
                $('#nota option').filter(function() {
                    return $(this).val() == data.nota;
                }).prop('selected', true);
                $('#instancia option').filter(function() {
                    return $(this).val() == data.id_instancia;
                }).prop('selected', true);
            });
        });
    </script>
@stop