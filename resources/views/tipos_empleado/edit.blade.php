@extends('layouts.app')

@section('title', 'Edicion del Tipo de Empleado #' . $tipo_empleado->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del Tipo de Empleado #{{ $tipo_empleado->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('tipos_empleado.update', $tipo_empleado->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="nombre_te" class="form-label"> Cargo : </label>
            <input type="text" name="nombre_te" value="{{ old('-', $tipo_empleado-> - ) }}" class="form-control">

            <br>

            <button type="submit" class="btn btn-success">Guardar Empleado</button>
            <a href="{{ route('tipos_empleado.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection