@extends('adminlte::page')

@section('title', 'Edicion del Modulo #' . $hora->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del modulo #{{ $hora->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('horas.update', $hora->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="hora" class="form-label"> Modulo: </label>
            <input type="text" name="hora" value="{{ old('hora', $hora->hora ) }}" class="form-control">

            <label for="hora_inicio" class="form-label"> Hora de incio: </label>
            <input type="time" name="hora_inicio" value="{{ old('hora_inicio', $hora->hora_inicio ) }}" class="form-control">

            <label for="hora_fin" class="form-label"> Hora de fin : </label><br>
            <input type="time" name="hora_fin" class="form-control" value="{{ old('hora_fin', $hora->hora_fin ) }}"><br>

            <button type="submit" class="btn btn-success">Guardar hora</button>
            <a href="{{ route('horas.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection