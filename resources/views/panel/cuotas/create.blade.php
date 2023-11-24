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
        <form action="{{ route('cuotas.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="mes" class="form-label">Mes: </label>
            <input type="text" name="mes" value="{{ old('mes') }}" class="form-control">

            <label for="monto" class="form-label">Monto: </label>
            <input type="text" name="monto" value="{{ old('monto') }}" class="form-control">

            <label for="interes" class="form-label">Interes: </label>
            <input type="number" name="interes" value="{{ old('interes') }}" class="form-control">

            <button type="submit" class="btn btn-success">Guardar Cuota</button>
            <a href="{{ route('cuotas.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection