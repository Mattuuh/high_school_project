@extends('adminlte::page')

@section('title', 'Crear una nueva Factura')

@section('header')
@stop

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear una nueva Factura</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('facturas.store') }}" method="POST" novalidate class="">
            @csrf

            <input type="number" name="id_emp" value="{{ $caja->id }}" hidden>

            <label for="dni_alu" class="form-label">Dni: </label>
            <div class="row">
                <div class="col-9">
                    <input list="dniList" id="search" type="text" name="dni_alu" value="{{ old('dni_alu') }}" class="form-control">
                    <datalist id="dniList"></datalist>
                </div>
                <div class="col-1">
                    <a class="btn btn-success fs-1" href="{{ route('alumnos.create') }}">+</a>
                </div>
            </div>

            <div id="name_group" hidden>
                <label for="name" class="form-label">Nombre: </label>
                <p id="name" type="text" name="name" value="{{ old('name') }}" class="form-control"></p>
            </div>

            <div id="lastname_group" hidden>
                <label for="lastname" class="form-label">Apellido : </label>
                <p id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" class="form-control"></p>
            </div>

            <label for="cuota" class="form-label">Cuota: </label>
            <select name="cuota" id="cuota" class="form-control">
                <option value="0" selected>---Seleccionar cuota---</option>
            @foreach ($cuotas as $cuota)
                <option value="{{ $cuota->mes }}" data-element-data={{ $cuota }}>{{ $cuota->mes }}</option>
            @endforeach
            </select>
            
            <div id="monto_group" hidden>
                <label for="monto" class="form-label">Monto : </label>
                <p id="monto" type="text" name="monto" value="{{ old('monto') }}" class="form-control"></p>
            </div>

            <label for="forma_pago" class="form-label">Forma de pago: </label>
            <select name="forma_pago" id="forma_pago" class="form-control">
                <option value="0" selected>---Seleccionar forma de pago---</option>
            @foreach ($forma_pagos as $forma_pago)
                <option value="{{ $forma_pago->nombre }}">{{ $forma_pago->nombre }}</option>
            @endforeach
            </select>

            <button type="submit" class="btn btn-success">Guardar Factura</button>
            <a href="{{ route('facturas.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/facturas.js') }}"></script>
@stop