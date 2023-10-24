@extends('adminlte::page')

@section('title', 'Periodos lectivo')

@section('content')
    @if(session('status'))  
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('periodos_lectivo.create') }}" class="btn btn-success">Agregar nuevo periodo lectivo</a>
    @if ($periodos_lectivo->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>Id</th>
                    <th>Año</th>
                    <th>Plan de Estudio</th>
                    <th>Modalidad</th>
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($periodos_lectivo as $periodo_lectivo)
                    <tr>
                        <td>{{ $periodo_lectivo->id }}</td>
                        <td>{{ $periodo_lectivo->anio }}</td>
                        <td>{{ $periodo_lectivo->plan_estudio_pl }}</td>
                        <td>{{ $periodo_lectivo->modalidad_pl }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('periodos_lectivo.show', $periodo_lectivo->id) }}">Ver</a>
                            <a href="{{ route('periodos_lectivo.edit', $periodo_lectivo->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('periodos_lectivo.destroy', $periodo_lectivo->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $periodos_lectivo->links() }}
        </div>
    @else
        <h4>No hay periodos lectivo cargados!</h4>
    @endif
@endsection