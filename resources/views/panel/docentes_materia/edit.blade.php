@extends('adminlte::page')

@section('title', 'Edicion #' . $alumno->id)

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion #{{ $alumno->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('docentes_materia.update', $dxm->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="docente" class="form-label">Docente </label>
            <input name="id_docente" type="text" value="{{ $dxm->docentes->nombre }} {{ $dxm->docentes->apellido }}" class="form-control" readonly>

            <label for="materia" class="form-label">Materia </label>
            <select name="id_materia" id="materia" class="form-control">
                <option value="0" selected>---Seleccionar materia---</option>
                @foreach ($materias as $materia)
                <option value="{{ $materia->id }}">{{ $materia->nom_materia }}</option>
                @endforeach
            </select>

            <label for="curso" class="form-label">Curso </label>
            <select name="id_curso" id="curso" class="form-control">
                <option value="0" selected>---Seleccionar curso---</option>
                @foreach ($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre }} {{ $curso->division }}</option>
                @endforeach
            </select>
            
            <button type="submit" class="btn btn-success">Guardar registro</button>
            <a href="{{ route('docentes_materia.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection