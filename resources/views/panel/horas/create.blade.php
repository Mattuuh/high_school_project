@extends('adminlte::page')

@section('title', 'Nuevo Modulo')

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Nuevo modulo</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('horas.store') }}" method="POST" novalidate>
            @csrf

            <label for="hora" class="form-label"> Modulo: </label>
            <input type="text" name="hora" value="{{ old('hora') }}" class="form-control">

            <label for="hora_inicio" class="form-label"> Hora de incio: </label>
            <input type="time" name="hora_inicio" value="{{ old('hora_inicio') }}" class="form-control">

            <label for="hora_fin" class="form-label"> Hora de fin : </label><br>
            <input type="time" name="hora_fin" class="form-control" value="{{ old('hora_fin') }}"><br>

            <button type="submit" class="btn btn-success">Guardar hora</button>
            <a href="{{ route('horas.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection