@extends('adminlte::page')

@section('title', 'Edicion del Horario #' . $horario->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del Horario #{{ $horario->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('horarios.update', $horario->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="fecha_alta_hor" class="form-label"> Fecha de Alta : </label>
            <input type="text" name="fecha_alta_hor" value="{{ old('fecha_alta_hor', $horario->fecha_alta_hor ) }}" class="form-control">

            <br>

            <label for="horario_hor" class="form-label"> Horario : </label><br>
            <input type="text" name="horario_hor" class="form-control" value="{{ old('horario_hor', $horario->horario_hor ) }}">

            <br>

            <button type="submit" class="btn btn-success">Guardar Horario</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection