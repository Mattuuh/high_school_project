@extends('layouts.app')

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
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($estados_asistencia as $estado_asistencia)
                    <tr>
                        <td>{{ $estado_asistencia->id }}</td>
                        <td>{{ $estado_asistencia-> }}</td>
                        <td>{{ $estado_asistencia-> }}</td>
                        <td>{{ $estado_asistencia-> }}</td>
                        <td>{{ $estado_asistencia-> }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('estados_asistencia.show', $estado_asistencia->id) }}">Ver</a>
                            <a href="{{ route('estados_asistencia.edit', $estado_asistencia->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('estados_asistencia.destroy', $estado_asistencia->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $estados_asistencia->links() }}
        </div>
    @else
        <h4>No hay estado de asistencia cargados!</h4>
    @endif
@endsection