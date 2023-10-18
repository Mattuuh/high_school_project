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
                    <th>Legajo</th>
                    <th>Nombre y Apellido</th>
                    <th>Dni</th>
                    <th>Domicilio</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Tipo de empleado</th>
                    <th>Fecha Ingreso</th>
                    <th>Fecha Egreso</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($empleados as $empleado)
                    <tr>
                        <td>{{ $empleado->legajo_emp }}</td>
                        <td>{{ $empleado->nombre_emp }} {{ $empleado->apellido_emp }}</td>
                        <td>{{ $empleado->dni_emp }}</td>
                        <td>{{ $empleado->domicilio_emp }}</td>
                        <td>{{ $empleado->telefono_emp }}</td>
                        <td>{{ $empleado->email_emp }}</td>
                        <td>{{ $empleado->tipo_emp }}</td>
                        <td>{{ $empleado->fecha_ingreso_emp }}</td>
                        <td>{{ $empleado->fecha_egreso_emp }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('empleados.show', $empleado->legajo_emp) }}">Ver</a>
                            <a href="{{ route('empleados.edit', $empleado->legajo_emp) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('empleados.destroy', $empleado->legajo_emp) }}" method="POST">
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