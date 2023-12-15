@extends('adminlte::page')

@section('title', 'Edicion del Estado de asistencia #' . $estado_asistencia->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del Estado de asistencia #{{ $estado_asistencia->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('estados_asistencia.update', $estado_asistencia->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="descripcion_ea" class="form-label"> Descripcion : </label>
            <input type="text" name="descripcion_ea" value="{{ old('descripcion_ea', $estado_asistencia->descripcion_ea ) }}" class="form-control">

            <br>

            <button type="submit" class="btn btn-success">Guardar Estado de asistencia</button>
            <a href="{{ route('estados_asistencia.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection