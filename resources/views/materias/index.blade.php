@extends('layouts.app')

@section('title', 'Materias')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('materias.create') }}" class="btn btn-success">Agregar nueva materia</a>
    @if ($materias->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Materia</th>
                    <th>Año</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($materias as $materia)
                    <tr>
                        <td>{{ $materia->id }}</td>
                        <td>{{ $materia->nom_materia }}</td>
                        <td>{{ $materia->anio_materia }}</td>
                        <td>{{ $materia-> }}</td>
                        <td>{{ $materia-> }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('materias.show', $materia->id) }}">Ver</a>
                            <a href="{{ route('materias.edit', $materia->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $materias->links() }}
        </div>
    @else
        <h4>No hay materias cargadas!</h4>
    @endif
@endsection