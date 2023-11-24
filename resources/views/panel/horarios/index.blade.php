@extends('adminlte::page')

@section('title', 'horarios')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        
    @if ($horarios->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>docente</th>
                    <th>materia</th>
                    <th>curso</th>
                    
                </tr>    
            </thead>
            <tbody>
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->empleado->nombre_emp}}</td>
                        <td>{{ $horario->materia->nom_materia}}</td>
                        <td>{{ $horario->curso->grado }}</td>
                                                   
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $horarios->links() }}
        </div>
    @else
        <h4>No hay horas cargadas!</h4>
    @endif
@endsection