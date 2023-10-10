@extends('layouts.app')

@section('title', 'Edicion del Horario #' . $horario->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion del Horario #{{ $horario->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('horarios.update', $horario->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="-" class="form-label"> - : </label>
            <input type="text" name="-" value="{{ old('-', $horario-> - ) }}" class="form-control">

            <br>

            <label for="-" class="form-label"> - : </label><br>
            <textarea name="-" cols="30" rows="4" class="form-control">{{ old('-', $horario-> - ) }}</textarea>

            <br>

            <label for="-" class="form-label"> - : </label>
            <input type="number" name="-" value="{{ old('-', $horario-> - ) }}" class="form-control">

            <br>

            <label for="-" class="form-label"> - : </label>
            <input type="number" name="-" value="{{ old('-', $horario-> - ) }}" class="form-control">

            <br>

            <button type="submit" class="btn btn-success">Guardar Horario</button>
            <a href="{{ route('horarios.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection