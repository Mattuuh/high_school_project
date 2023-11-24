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

            <label for="dni_emp" class="form-label">Dni: </label>
            <input list="dniList" id="search" type="text" name="dni_emp" value="{{ old('dni_emp') }}" class="form-control">
            <datalist id="dniList"></datalist>

            <div id="nombre_group" hidden>
                <label for="nombre_alu" class="form-label">Nombre: </label>
                <p id="nombre_alu" type="text" name="nombre_alu" value="{{ old('nombre_alu') }}" class="form-control"></p>
            </div>

            <div id="apellido_group" hidden>
                <label for="apellido_alu" class="form-label">Apellido : </label>
                <p id="apellido_alu" type="text" name="apellido_alu" value="{{ old('apellido_alu') }}" class="form-control"></p>
            </div>

            <label for="domicilio_emp" class="form-label">Domicilio: </label>
            <input type="text" name="domicilio_emp" value="{{ old('domicilio_emp') }}" class="form-control">

            <label for="telefono_emp" class="form-label">Telefono: </label>
            <input type="number" name="telefono_emp" value="{{ old('telefono_emp') }}" class="form-control">

            <button type="submit" class="btn btn-success">Guardar Empleado</button>
            <a href="{{ route('empleados.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/facturas.js') }}"></script>
@stop