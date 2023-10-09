@extends('layouts.app')

@section('title', 'Edicion de la Forma de pago #' . $forma_pago->id)

@section('content')
<div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Edicion de la Forma de pago #{{ $forma_pago->id }}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('formas_pago.update', $forma_pago->id) }}" method="POST" novalidate>
            @csrf @method('PUT')

            <label for="-" class="form-label"> - : </label>
            <input type="text" name="-" value="{{ old('-', $forma_pago-> - ) }}" class="form-control">

            <br>

            <label for="-" class="form-label"> - : </label><br>
            <textarea name="-" cols="30" rows="4" class="form-control">{{ old('-', $forma_pago-> - ) }}</textarea>

            <br>

            <label for="-" class="form-label"> - : </label>
            <input type="number" name="-" value="{{ old('-', $forma_pago-> - ) }}" class="form-control">

            <br>

            <label for="-" class="form-label"> - : </label>
            <input type="number" name="-" value="{{ old('-', $forma_pago-> - ) }}" class="form-control">

            <br>

            <button type="submit" class="btn btn-success">Guardar forma de pago</button>
            <a href="{{ route('formas_pago.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection