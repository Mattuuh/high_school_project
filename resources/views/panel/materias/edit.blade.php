@extends('adminlte::page')

@section('title', 'Edicion de la Materia #' . $materia->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion de la Materia #{{ $materia->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('materias.update', $materia->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="nom_materia" class="form-label"> Materia : </label>
            <input type="text" name="nom_materia" value="{{ old('nom_materia', $materia->nom_materia ) }}" class="form-control">

            <br>

            <label for="anio_materia" class="form-label"> Año : </label><br>
            <input type="text" name="anio_materia" cols="30" rows="4" class="form-control" value="{{ old('anio_materia', $materia->anio_materia ) }}">

            <br>

            <button type="submit" class="btn btn-success">Guardar Materia</button>
            <a href="{{ route('materias.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection