@extends('adminlte::page')

@section('title', 'Edicion de Horario')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container pb-2 border rounded-2 bg-light">
        <h1>Editar Horario</h1>

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

            <form action="{{ route('horarios.update', $curso->id) }}" method="POST" novalidate class="">
                @csrf
                @method('PUT')
    
                <div class="row mb-3">
                    <div class="col-4">
                        <label for="curso" class="form-label">Curso: {{ $curso->nombre }} "{{ $curso->division }}" - Ciclo {{ $curso->periodo_lectivo->modalidad }}</label>
                        
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
                                @for ($dia = 1; $dia <= 5; $dia++)
                                    <td>
                                        <select name="materias[{{ $hora->id }}][{{ $dia }}]" class="form-control materiaEdit">
                                            <option value="0">-Seleccionar materia-</option>
                                            @foreach ($materias as $materia)
                                                <option value="{{ $materia->id }}" {{ isset($horariosAgrupados[$hora->id][$dia]) && $horariosAgrupados[$hora->id][$dia]['materia_id'] == $materia->id ? 'selected' : '' }}>
                                                    {{ $materia->nom_materia }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <select name="docentes[{{ $hora->id }}][{{ $dia }}]" class="form-control docenteEdit">
                                            <option value="0">-Seleccionar docente-</option>
                                            @foreach ($docentes as $docente)
                                                @if ($docente->id_materia == (isset($horariosAgrupados[$hora->id][$dia]) ? $horariosAgrupados[$hora->id][$dia]['materia_id'] : null))
                                                    <option value="{{ $docente->id_docente }}" {{ isset($horariosAgrupados[$hora->id][$dia]) && $horariosAgrupados[$hora->id][$dia]['docente_id'] == $docente->id_docente ? 'selected' : '' }}>
                                                        {{ $docente->docentes->nombre }} {{ $docente->docentes->apellido }}
                                                    </option>
                                                @endif
                                                
                                            @endforeach
                                        </select>
                                    </td>
                                @endfor
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-6">
                        <a href="{{ route('horarios.index') }}" class="btn btn-danger">Cancelar</a>
                    </div>
                    <div class="col-6 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success">Guardar Horario</button>
                    </div>
                    
                </div>
            </form>
        </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{ asset('js/horarios.js') }}"></script>
@stop