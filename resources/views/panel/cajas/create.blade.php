@extends('adminlte::page')

@section('title', 'Edicion de caja')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Apertura de caja</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('cajas.store') }}" method="POST" novalidate class="">
            @csrf
            <input type="number" name="legajo_emp" value="{{ auth()->user()->empleados->legajo_emp }}" class="form-control" hidden>
            
            <label for="dni" class="form-label">Dni: </label>
            <input type="text" name="dni" value="{{ auth()->user()->empleados->dni }}" class="form-control" readonly>

            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" value="{{ auth()->user()->empleados->nombre }}" class="form-control" readonly>

            <label for="apellido" class="form-label">Apellido : </label>
            <input type="text" name="apellido" value="{{ auth()->user()->empleados->apellido }}" class="form-control" readonly>

            <label for="monto_inicial" class="form-label">Monto inicial: </label>
            {{-- <select name="monto" id="monto_inicial" class="form-control">
                <option value="10000">10000</option>
                <option value="15000">15000</option>
                <option value="20000">20000</option>
                <option value="25000">25000</option>
            </select> --}}
            <input type="number" name="monto_inicial" value="{{ old('monto_inicial') }}" class="form-control">

            <button type="submit" class="btn btn-success">Guardar</button>
            <a href="{{ route('facturas.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection