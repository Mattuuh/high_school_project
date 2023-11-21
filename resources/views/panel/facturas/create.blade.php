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

            <label for="dni_alu" class="form-label">Dni: </label>
            <div class="row">
                <div class="col-9">
                    <input list="dniList" id="search" type="text" name="dni_alu" value="{{ old('dni_alu') }}" class="form-control">
                    <datalist id="dniList"></datalist>
                </div>
                <div class="col-1">
                    <button class="btn btn-success fs-1">+</button>
                </div>
            </div>

            <div id="nombre_group" hidden>
                <label for="nombre_alu" class="form-label">Nombre: </label>
                <p id="nombre_alu" type="text" name="nombre_alu" value="{{ old('nombre_alu') }}" class="form-control"></p>
            </div>

            <div id="apellido_group" hidden>
                <label for="apellido_alu" class="form-label">Apellido : </label>
                <p id="apellido_alu" type="text" name="apellido_alu" value="{{ old('apellido_alu') }}" class="form-control"></p>
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

            <button type="submit" class="btn btn-success">Guardar Factura</button>
            <a href="{{ route('facturas.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/facturas.js') }}"></script>
@stop