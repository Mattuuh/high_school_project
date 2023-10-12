@extends('layouts.app')

@section('title', 'Crear nuevo Horario')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear un nuevo Horario</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('horarios.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="fecha_alta_hor" class="form-label"> Fecha de Alta : </label>
            <input type="text" name="fecha_alta_hor" value="{{ old('-') }}" class="form-control">

            <br>

            <label for="horario_hor" class="form-label"> Horario : </label><br>
            <textarea name="horario_hor" cols="30" rows="4" class="form-control">{{ old('-') }}</textarea>

            <br>

            <button type="submit" class="btn btn-success">Guardar Horario</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection