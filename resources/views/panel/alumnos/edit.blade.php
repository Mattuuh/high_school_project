@extends('adminlte::page')

@section('title', 'Edicion del alumno #' . $alumno->id)

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del alumno #{{ $alumno->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('alumnos.update', $alumno->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" value="{{ $alumno->nombre }}" class="form-control">

            <label for="apellido" class="form-label">Apellido : </label>
            <input type="text" name="apellido" value="{{ $alumno->apellido }}" class="form-control">

            <label for="dni" class="form-label">Dni: </label>
            <input type="number" name="dni" value="{{ $alumno->dni }}" class="form-control">

            <label for="domicilio" class="form-label">Domicilio: </label>
            <input type="text" name="domicilio" value="{{ $alumno->domicilio }}" class="form-control">

            <label for="telefono" class="form-label">Telefono: </label>
            <input type="number" name="telefono" value="{{ $alumno->telefono }}" class="form-control">
            
            <label for="email" class="form-label">Email: </label>
            <input type="email" name="email" value="{{ $alumno->email }}" class="form-control">
            
            <button type="submit" class="btn btn-success">Guardar alumno</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection