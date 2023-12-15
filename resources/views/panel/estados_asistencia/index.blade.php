@extends('adminlte::page')

@section('title', 'Estados de asistencia')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('estados_asistencia.create') }}" class="btn btn-success">Agregar nuevo estado de asistencia</a>
    @if ($estados_asistencia->count())
        <table class="table table-striped mt-1">
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
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#showModal" data-bs-dato="{{ $estado_asistencia }}">
                                Ver
                            </button>
                            <a href="{{ route('estados_asistencia.edit', $estado_asistencia->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <button type="button" class="btn btn-delete btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" data-id="{{ $estado_asistencia->id }}" data-nombre="{{ $estado_asistencia->descripcion_ea }}">
                                Eliminar
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>No hay estado de asistencia cargados!</h4>
    @endif
@endsection