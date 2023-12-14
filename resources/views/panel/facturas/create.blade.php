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

            <input type="number" name="id_caja" value="{{ $caja->id }}" hidden>
            <input type="text" name="created_at" value="{{ now() }}" hidden>

            <label for="dni" class="form-label">Dni: </label>
            <select id="search" name="legajo_alu" class="form-control form-control-lg"></select>

            <div id="name_group" hidden>
                <label for="name" class="form-label">Nombre: </label>
                <p id="name" type="text" name="name" value="{{ old('name') }}" class="form-control"></p>
            </div>

            <div id="lastname_group" hidden>
                <label for="lastname" class="form-label">Apellido : </label>
                <p id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" class="form-control"></p>
            </div>

            <label for="id_cuota" class="form-label">Cuota: </label>
            <select name="id_cuota" id="cuota" class="form-control">
                @if ($cuotas != null)
                    <option value="0" selected>---Seleccionar cuota---</option>
                @else
                    <option value="0" selected>Todas las cuotas estan pagadas</option>
                @endif
                
            </select>
            
            <div id="monto_group" hidden>
                <label for="monto" class="form-label">Monto : </label>
                <p id="monto" type="text" name="monto" value="{{ old('monto') }}" class="form-control"></p>
            </div>

            <label for="forma_pago" class="form-label">Forma de pago: </label>
            <select name="id_forma_pago" id="id_forma_pago" class="form-control">
                <option value="" selected>---Seleccionar forma de pago---</option>
            @foreach ($forma_pagos as $forma_pago)
                <option value="{{ $forma_pago->id }}">{{ $forma_pago->nombre }}</option>
            @endforeach
            </select>

            <div class="row p-2">
                <button type="submit" class="btn btn-success">Guardar Factura</button>
                <a href="{{ route('facturas.index') }}" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
        </div>
    </div>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/facturas.js') }}"></script>
@stop