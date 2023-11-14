@extends('adminlte::page')

@section('title', 'Crear un nuevo alumno')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light p-3">
        <h1>Crear nuevo Alumno</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('alumnos.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="nombre_alu" class="form-label">Nombre: </label>
            <input type="text" name="nombre_alu" value="{{ old('nombre_alu') }}" class="form-control">

            <label for="apellido_alu" class="form-label">Apellido : </label>
            <input type="text" name="apellido_alu" value="{{ old('apellido_alu') }}" class="form-control">

            <label for="dni_alu" class="form-label">Dni: </label>
            <input type="number" name="dni_alu" value="{{ old('dni_alu') }}" class="form-control">

            <label for="domicilio_alu" class="form-label">Domicilio: </label>
            <input type="text" name="domicilio_alu" value="{{ old('domicilio_alu') }}" class="form-control">

            <label for="telefono_alu" class="form-label">Telefono: </label>
            <input type="number" name="telefono_alu" value="{{ old('telefono_alu') }}" class="form-control">

            <div class="mt-3">
                <button type="submit" class="btn btn-success">Guardar alumno</button>
                <a href="{{ route('alumnos.index') }}" class="btn btn-danger text-end">Cancelar</a>
            </div>
        </form>
        </div>
    </div>
@endsection