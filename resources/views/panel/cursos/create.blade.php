@extends('adminlte::page')

@section('title', 'Crear un nuevo Curso')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear un nuevo Curso</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('cursos.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="nombre" class="form-label">Curso: </label>
            <select name="nombre" id="curso" class="form-control">
                <option value="nada" {{ old('nombre') == 'nada' ? 'selected' : '' }}>-Seleccionar opcion-</option>
                <option value="1" {{ old('nombre') == '1' ? 'selected' : '' }}>1</option>
                <option value="2" {{ old('nombre') == '2' ? 'selected' : '' }}>2</option>
                <option value="3" {{ old('nombre') == '3' ? 'selected' : '' }}>3</option>
                <option value="4" {{ old('nombre') == '4' ? 'selected' : '' }}>4</option>
                <option value="5" {{ old('nombre') == '5' ? 'selected' : '' }}>5</option>
            </select>

            <label for="division" class="form-label">Division : </label>
            <input type="text" name="division" value="{{ old('division') }}" class="form-control">

            <label for="cupos" class="form-label">Cupo: </label>
            <input type="number" name="cupos" id="cupos" value="{{ old('cupos') }}" class="form-control">

            <label for="disponibilidad" class="form-label">Disponibilidad: </label>
            <input type="number" name="disponibilidad" id="disponibilidad" value="{{ old('disponibilidad') }}" class="form-control" readonly>

            <label for="anio_lectivo" class="form-label">Año lectivo: </label>
            <select name="anio_lectivo" id="anio_lectivo" class="form-control">
                @foreach ($periodos_lectivo as $periodo_lectivo)
                    <option value="{{ $periodo_lectivo->id }}">{{ $periodo_lectivo->modalidad }} - {{ $periodo_lectivo->anio }}</option>
                @endforeach
            </select><br>

            <button type="submit" class="btn btn-success">Guardar Curso</button>
            <a href="{{ route('cursos.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('#cupos').blur(function() {
            $('#disponibilidad').val(this.value)
        })
    });
</script>
@stop