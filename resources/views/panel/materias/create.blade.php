@extends('adminlte::page')

@section('title', 'Crear una nueva Materia')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear una nueva Materia</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('materias.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="nom_materia" class="form-label"> Materia : </label>
            <input type="text" name="nom_materia" value="{{ old('anio_materia') }}" class="form-control">

            <br>

            <label for="anio_materia" class="form-label"> Año : </label><br>
            <input name="anio_materia" class="form-control" value="{{ old('anio_materia') }}">

            <br>

            <button type="submit" class="btn btn-success">Guardar Materia</button>
            <a href="{{ route('materias.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection