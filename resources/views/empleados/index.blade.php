@extends('layouts.app')

@section('title', 'Empleados')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('empleados.create') }}" class="btn btn-success">Agregar nuevo empleado</a>
    @if ($empleados->count())
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
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->id }}</td>
                        <td>{{ $empleado-> }}</td>
                        <td>{{ $empleado-> }}</td>
                        <td>{{ $empleado-> }}</td>
                        <td>{{ $empleado-> }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('empleados.show', $empleado->id) }}">Ver</a>
                            <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $empleados->links() }}
        </div>
    @else
        <h4>No hay empleados cargados!</h4>
    @endif
@endsection