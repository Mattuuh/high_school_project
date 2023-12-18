@extends('adminlte::page')

@section('title', 'Crear un nuevo empleado')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear un nuevo Empleado</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('empleados.store') }}" method="POST" novalidate class="" enctype="multipart/form-data">
            @csrf

            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">

            <label for="apellido" class="form-label">Apellido : </label>
            <input type="text" name="apellido" value="{{ old('apellido') }}" class="form-control">

            <label for="dni" class="form-label">Dni: </label>
            <input type="number" name="dni" value="{{ old('dni') }}" class="form-control">

            <label for="imagen" class="form-label">Imagen </label>
            <input class="form-control" type="file" id="imagen" name="imagen" accept="image/*">

            <label for="domicilio" class="form-label">Domicilio: </label>
            <input type="text" name="domicilio" value="{{ old('domicilio') }}" class="form-control">

            <label for="telefono" class="form-label">Telefono: </label>
            <input type="number" name="telefono" value="{{ old('telefono') }}" class="form-control">
            
            <label for="email" class="form-label">Email: </label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control">

            <label for="tipo_emp" class="form-label">Tipo: </label>
            <select name="tipo_emp" id="tipo_emp" class="form-control">
                <option value="nada">--Seleccion una opcion--</option>
            @foreach ($tiposEmp as $tipoEmp)
                <option value="{{ $tipoEmp->id }}">{{ $tipoEmp->nombre_te }}</option>
            @endforeach
            </select>

            <button type="submit" class="btn btn-success">Guardar Empleado</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection