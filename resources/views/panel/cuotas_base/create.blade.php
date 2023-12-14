@extends('adminlte::page')

@section('title', 'Crear una nueva cuota')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear una nueva cuota</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('cuotasbase.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="mes" class="form-label">Mes: </label>
            <select name="mes" id="mes" class="form-control">
                <option value="enero">Enero</option>
                <option value="febrero">Febrero</option>
                <option value="marzo">Marzo</option>
                <option value="abril">Abril</option>
                <option value="mayo">Mayo</option>
                <option value="junio">Junio</option>
                <option value="julio">Julio</option>
                <option value="agosto">Agosto</option>
                <option value="septiembre">Septiembre</option>
                <option value="octubre">Octubre</option>
                <option value="noviembre">Noviembre</option>
                <option value="diciembre">Diciembre</option>
            </select>

            <label for="monto" class="form-label">Monto: </label>
            <input type="text" name="monto" value="{{ old('monto') }}" class="form-control">

            <label for="interes" class="form-label">Interes: </label>
            <input type="number" name="interes" value="{{ old('interes') }}" class="form-control">

            <button type="submit" class="btn btn-success">Guardar Cuota</button>
            <a href="{{ route('cuotasbase.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection