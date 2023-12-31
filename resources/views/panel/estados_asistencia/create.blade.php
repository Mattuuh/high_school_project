@extends('layouts.app')

@section('title', 'Crear nuevo estado de asistencia')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear un nuevo estados de asistencia</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('estados_asistencia.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="descripcion_ea" class="form-label"> Descripcion : </label>
            <input type="text" name="descripcion_ea" value="{{ old('-') }}" class="form-control">

            <br>

            <button type="submit" class="btn btn-success">Guardar estado de asistencia</button>
            <a href="{{ route('estados_asistencia.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection