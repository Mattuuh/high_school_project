@extends('adminlte::page')

@section('title', 'Registro de nota')

@section('content')

<div class="d-flex justify-content-center">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
                <h5 class="modal-title">Registrar notas</h5>
                <form id="formNotas" method="POST" action="{{ route('registro_academico.store') }}">
        
                    <div class="modal-body">
                        @csrf

                        <input type="number" name="id_alumno" value="{{ $alumno->id }}" hidden>
                        <label for="nombre" class="form-label">Nombre:</label>
                        <p id="nombre" class="form-control">{{ $alumno->nombre }}</p>
                        <label for="apellido" class="form-label">Apellido:</label>
                        <p id="apellido" class="form-control">{{ $alumno->apellido }}</p>
                        <div class="row">
                            <div class="col-6">
                                <label for="dni" class="form-label">Dni:</label>
                                <p id="dni" class="form-control">{{ $alumno->dni }}</p>
                            </div>
                            <div class="col-6">
                                <label for="curso" class="form-label">Curso:</label>
                                <p id="curso" class="form-control">{{ $alumno->curso->nombre }} "{{ $alumno->curso->division }}"</p>
                            </div>
                        </div>
        
                        {{-- <div class="row">
                            <div class="col-6">
                                <label for="notas-lengua" class="form-label">Lengua:</label>
                                <select name="notas-lengua" id="notas-lengua" class="form-control">
                                    <option value="0" selected>0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>        
                            </div>
                            <div class="col-6">
                                <label for="instancia" class="form-label">Instancia:</label>
                                <select name="instancia" id="instancia" class="form-control">
                                    <option value="0" selected>0</option>
                                    <option value="1">Primer cuatrimestre</option>
                                    <option value="2">Segundo cuatrimestre</option>
                                    <option value="3">3</option>
                                </select> 
                            </div>
                        </div> --}}
                        @foreach ($materias as $materia)
                            <div class="row">
                                <div class="col-6">
                                    <label for="notas-{{ $materia->id }}" class="form-label">{{ $materia->materias->nom_materia }}:</label>
                                    <select name="notas[{{ $materia->id }}]" id="notas[{{ $materia->materias->nom_materia }}]" class="form-control">
                                        <option value="0" selected>0</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>        
                                </div>
                                <div class="col-6">
                                    <label for="instancia" class="form-label">Instancia:</label>
                                    <select name="instancia[{{ $materia->id }}]" id="instancia[{{ $materia->id }}]" class="form-control">
                                        <option value="0" selected>Seleccionar una opcion</option>
                                        @foreach ($instancias as $instancia)
                                            <option value="{{ $instancia->id }}">{{ $instancia->descripcion }}</option>
                                        @endforeach
                                    </select> 
                                </div>
                            </div>
                        @endforeach
                        
                    </div>
                    <button type="submit" class="btn btn-success text-uppercase">
                        Guardar
                    </button>
                    <a href="{{ route('registro_academico.index') }}" class="btn btn-danger text-uppercase">
                        Cancelar
                    </a>
                </form>
            </div>
        </div>    
    </div>
    
</div>

@endsection