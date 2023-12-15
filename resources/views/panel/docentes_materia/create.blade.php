@extends('adminlte::page')

@section('title', 'Registro')

@section('content')
    @if (session('status'))
    <div class="alert alert-danger">
        {{ session('status') }}
    </div>
    @endif
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Registro</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('docentes_materia.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="docente" class="form-label">Docente </label>
            <select name="id_docente" id="docente" class="form-control">
                <option value="0" selected>---Seleccionar docente---</option>
                @foreach ($docentes as $docente)
                <option value="{{ $docente->legajo_emp }}">{{ $docente->nombre }} {{ $docente->apellido }}</option>
                @endforeach
            </select>

            <label for="materia" class="form-label">Materia </label>
            <select name="id_materia" id="materia" class="form-control">
                <option value="0" selected>---Seleccionar materia---</option>
                @foreach ($materias as $materia)
                <option value="{{ $materia->id }}">{{ $materia->nom_materia }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-success">Guardar registro</button>
            <a href="javascript:history.back()" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection