@extends('adminlte::page')

@section('title', 'Cierre de caja')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Cerrie de caja #{{ $caja->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('cajas.update', $caja->id) }}" method="POST" novalidate>
            @csrf
            @method('PUT')

            <label for="dni" class="form-label">Dni: </label>
            <input type="number" name="dni" value="{{ $caja->empleado->dni }}" class="form-control" readonly>

            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" value="{{ $caja->empleado->nombre }}" class="form-control" readonly>

            <label for="apellido" class="form-label">Apellido : </label>
            <input type="text" name="apellido" value="{{ $caja->empleado->nombre }}" class="form-control" readonly>

            <label for="monto_inicial" class="form-label">Monto inicial: </label>
            <input type="text" name="monto_inicial" value="{{ $caja->monto_inicial }}" class="form-control" readonly>

            <label for="monto_cierre" class="form-label">Monto cierre: </label>
            <input type="text" name="monto_cierre" value="{{ $caja->monto_cierre }}" class="form-control" readonly>

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('facturas.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection