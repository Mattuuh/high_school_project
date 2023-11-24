@extends('adminlte::page')

@section('title', 'Crear un nuevo alumno')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear un nuevo alumno</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('facturas.storealumno') }}" method="POST" novalidate class="">
            @csrf

            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">

            <label for="apellido" class="form-label">Apellido : </label>
            <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control">

            <label for="dni" class="form-label">Dni: </label>
            <input type="number" name="dni" value="{{ old('dni') }}" class="form-control">

            <label for="domicilio" class="form-label">Domicilio: </label>
            <input type="text" name="domicilio" value="{{ old('domicilio') }}" class="form-control">

            <label for="telefono" class="form-label">Telefono: </label>
            <input type="number" name="telefono" value="{{ old('telefono') }}" class="form-control">
            
            <label for="email" class="form-label">Email: </label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">

            <button type="submit" class="btn btn-success">Guardar alumno</button>
            <a href="javascript:history.back()" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection