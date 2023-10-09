@extends('layouts.app')

@section('title', 'Horarios')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('horarios.create') }}" class="btn btn-success">Agregar nuevo horario</a>
    @if ($horarios->count())
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
                @foreach ($horarios as $horario)
                    <tr>
                        <td>{{ $horario->id }}</td>
                        <td>{{ $horario-> }}</td>
                        <td>{{ $horario-> }}</td>
                        <td>{{ $horario-> }}</td>
                        <td>{{ $horario-> }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('horarios.show', $horario->id) }}">Ver</a>
                            <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $horarios->links() }}
        </div>
    @else
        <h4>No hay horarios cargados!</h4>
    @endif
@endsection