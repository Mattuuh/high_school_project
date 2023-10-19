@extends('layouts.app')

@section('title', 'Tipos de empleado')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('tipos_empleado.create') }}" class="btn btn-success">Agregar nuevo tipo de empleado</a>
    @if ($tipos_empleado->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($tipos_empleado as $tipo_empleado)
                    <tr>
                        <td>{{ $tipo_empleado->id }}</td>
                        <td>{{ $tipo_empleado->nombre_te }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('tipos_empleado.show', $tipo_empleado->id) }}">Ver</a>
                            <a href="{{ route('tipos_empleado.edit', $tipo_empleado->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('tipos_empleado.destroy', $tipo_empleado->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $tipos_empleado->links() }}
        </div>
    @else
        <h4>No hay tipos de empleados cargados!</h4>
    @endif
@endsection