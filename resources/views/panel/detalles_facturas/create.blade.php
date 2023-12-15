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
        <form action="{{ route('empleados.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="nombre_emp" class="form-label">Nombre: </label>
            <input type="text" name="nombre_emp" value="{{ old('nombre_emp') }}" class="form-control">

            <label for="apellido_emp" class="form-label">Apellido : </label>
            <input type="text" name="apellido_emp" value="{{ old('apellido_emp') }}" class="form-control">

            <label for="dni_emp" class="form-label">Dni: </label>
            <input type="number" name="dni_emp" value="{{ old('dni_emp') }}" class="form-control">

            <label for="domicilio_emp" class="form-label">Domicilio: </label>
            <input type="text" name="domicilio_emp" value="{{ old('domicilio_emp') }}" class="form-control">

            <label for="telefono_emp" class="form-label">Telefono: </label>
            <input type="number" name="telefono_emp" value="{{ old('telefono_emp') }}" class="form-control">

            <label for="tipo_emp" class="form-label">Tipo: </label>
            <input type="text" name="tipo_emp" value="{{ old('tipo_emp') }}" class="form-control">

            <label for="fecha_ingreso_emp" class="form-label">Fecha de ingreso: </label>
            <input type="text" name="fecha_ingreso_emp" value="{{ old('fecha_ingreso_emp') }}" class="form-control">

            <label for="fecha_egreso_emp" class="form-label">Fecha de egreso: </label>
            <input type="text" name="fecha_egreso_emp" value="{{ old('fecha_egreso_emp') }}" class="form-control">

            <button type="submit" class="btn btn-success">Guardar Empleado</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection