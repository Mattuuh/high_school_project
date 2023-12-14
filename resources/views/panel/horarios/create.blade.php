@extends('adminlte::page')

@section('title', 'Crear nuevo Horario')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container pb-2 border rounded-2 bg-light">
        <h1>Nuevo Horario</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        <div class="container">

            <div class="row mb-3">
                <div class="col-2">
                    <label for="curso" class="form-label">Curso: </label>
                    <select name="id_curso" id="curso" class="form-control">
                        <option value="0" selected>-Seleccionar curso-</option>
                        @foreach ($cursos as $curso)
                        <option value="{{ $curso->id }}">{{ $curso->nombre }} {{ $curso->division }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <table class="table table-bordered">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Hora</th>
                        <th scope="col">Lunes</th>
                        <th scope="col">Martes</th>
                        <th scope="col">Miércoles</th>
                        <th scope="col">Jueves</th>
                        <th scope="col">Viernes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($horas as $hora)
                        <tr>
                            <td>{{ $hora->hora_inicio }} - {{ $hora->hora_fin }}</td>
                            <td>
                                <select name="materia" id="materia" class="form-control">
                                    <option value="0" selected>-Seleccionar materia-</option>
                                    @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nom_materia }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="materia" id="materia" class="form-control">
                                    <option value="0" selected>-Seleccionar materia-</option>
                                    @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nom_materia }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="materia" id="materia" class="form-control">
                                    <option value="0" selected>-Seleccionar materia-</option>
                                    @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nom_materia }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="materia" id="materia" class="form-control">
                                    <option value="0" selected>-Seleccionar materia-</option>
                                    @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nom_materia }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="materia" id="materia" class="form-control">
                                    <option value="0" selected>-Seleccionar materia-</option>
                                    @foreach ($materias as $materia)
                                    <option value="{{ $materia->id }}">{{ $materia->nom_materia }}</option>
                                    @endforeach
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <form action="{{ route('horarios.store') }}" method="POST" novalidate class="">
            @csrf

            <button type="submit" class="btn btn-success">Guardar Horario</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection