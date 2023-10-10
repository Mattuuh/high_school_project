@extends('layouts.app')

@section('title', 'Formas de pago')

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
        <a href="{{ route('formas_pago.create') }}" class="btn btn-success">Agregar nuevo forma de pago</a>
    @if ($formas_pago->count())
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
                @foreach ($formas_pago as $forma_pago)
                    <tr>
                        <td>{{ $forma_pago->id }}</td>
                        <td>{{ $forma_pago-> }}</td>
                        <td>{{ $forma_pago-> }}</td>
                        <td>{{ $forma_pago-> }}</td>
                        <td>{{ $forma_pago-> }}</td>
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('formas_pago.show', $forma_pago->id) }}">Ver</a>
                            <a href="{{ route('formas_pago.edit', $forma_pago->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('formas_pago.destroy', $forma_pago->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $formas_pago->links() }}
        </div>
    @else
        <h4>No hay formas de pago cargados!</h4>
    @endif
@endsection