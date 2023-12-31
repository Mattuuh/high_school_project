@extends('adminlte::page')

@section('title', 'Edicion del Empleado #' . $empleado->legajo_emp)

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del Empleado #{{ $empleado->legajo_emp }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('empleados.update', $empleado->legajo_emp) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" value="{{ old('nombre', $empleado->nombre) }}" class="form-control">

            <label for="apellido" class="form-label">Apellido : </label>
            <input type="text" name="apellido" value="{{ old('apellido', $empleado->apellido) }}" class="form-control">

            <label for="dni" class="form-label">Dni: </label>
            <input type="number" name="dni" value="{{ old('dni', $empleado->dni) }}" class="form-control">

            <label for="imagen" class="form-label">Imagen </label>
            <input type="file" name="imagen" value="{{ old('imagen') }}" class="form-control">

            <label for="domicilio" class="form-label">Domicilio: </label>
            <input type="text" name="domicilio" value="{{ old('domicilio', $empleado->domicilio) }}" class="form-control">

            <label for="telefono" class="form-label">Telefono: </label>
            <input type="number" name="telefono" value="{{ old('telefono', $empleado->telefono) }}" class="form-control">

            <label for="tipo_emp" class="form-label">Tipo: </label>
            <select name="tipo_emp" id="tipo_emp" class="form-control">
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