@extends('layouts.app')

@section('title', 'Edicion del curso #' . $curso->legajo_emp)

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del curso #{{ $curso->legajo_emp }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('cursos.update', $curso->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="nombre" class="form-label">Sección: </label>
            <input type="text" name="nombre" value="{{ $curso->nombre }}" class="form-control">

            <label for="cupos" class="form-label">Cupos : </label>
            <input type="text" name="cupos" value="{{ $curso->cupos }}" class="form-control">

            <button type="submit" class="btn btn-success">Guardar curso</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection