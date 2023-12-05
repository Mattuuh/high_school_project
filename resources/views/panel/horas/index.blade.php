@extends('adminlte::page')

@section('title', 'horas')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        
    @if ($horas->count())
        <table class="table table-striped mt-1">
            <thead class="table-dark">
                <tr>
                    <th>hora</th>
                    <th>inicio</th>
                    <th>fin</th>
                    
                </tr>    
            </thead>
            <tbody>
                @foreach ($horas as $hora)
                    <tr>
                        <td>{{ $hora->hora }}</td>
                        <td>{{ $hora->hora_inicio }}</td>
                        <td>{{ $hora->hora_fin }}</td>
                                                   
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $horas->links() }}
        </div>
    @else
        <h4>No hay horas cargadas!</h4>
    @endif
@endsection