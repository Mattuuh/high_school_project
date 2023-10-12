@extends('layouts.app')

@section('title', 'Edicion del Periodo lectivo #' . $periodo_lectivo->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del Periodo lectivo #{{ $periodo_lectivo->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('periodos_lectivo.update', $periodo_lectivo->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="anio" class="form-label"> Año : </label>
            <input type="text" name="anio" value="{{ old('anio', $periodo_lectivo->anio ) }}" class="form-control">

            <br>

            <label for="plan_estudio_pl" class="form-label"> Plan de Estudio : </label><br>
            <input name="plan_estudio_pl" class="form-control" value="{{ old('plan_estudio_pl', $periodo_lectivo->plan_estudio_pl ) }}">

            <br>

            <label for="modalidad_pl" class="form-label"> Modalidad : </label>
            <input type="number" name="modalidad_pl" value="{{ old('modalidad_pl', $periodo_lectivo->modalidad_pl ) }}" class="form-control">

            <br>

            <button type="submit" class="btn btn-success">Guardar Periodo lectivo</button>
            <a href="{{ route('periodos_lectivo.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection