@extends('adminlte::page')

@section('title', 'Crear un nuevo periodo lectivo')

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
    <div class="container w-25 pb-2 border rounded-2 bg-light">
    <h1>Crear un nuevo periodo lectivo</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('periodos_lectivo.store') }}" method="POST" novalidate class="">
        @csrf

        <label for="anio" class="form-label"> Año : </label>
        <input type="number" name="anio" value="{{ old('anio') }}" class="form-control">

        <br>

        <label for="plan_estudio" class="form-label"> Plan de Estudio : </label><br>
        <input type="text" name="plan_estudio" class="form-control" value="{{ old('plan_estudio') }}" >

        <br>

        <label for="modalidad" class="form-label"> Modalidad : </label>
        <input type="text" name="modalidad" value="{{ old('modalidad') }}" class="form-control">

        <br>

        <button type="submit" class="btn btn-success">Guardar periodo lectivo</button>
        <a href="{{ route('periodos_lectivo.index') }}" class="btn btn-danger text-end">Cancelar</a>
    </form>
    </div>
</div>
@endsection