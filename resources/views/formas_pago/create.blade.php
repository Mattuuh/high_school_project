@extends('layouts.app')

@section('title', 'Crear una nueva Forma de pago')

@section('content')
    <div class="bg-secondary-subtle min-vh-100 pt-4">
        <div class="container w-25 pb-2 border rounded-2 bg-light">
        <h1>Crear una nueva forma de pago</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('formas_pago.store') }}" method="POST" novalidate class="">
            @csrf

            <label for="detalle_fp" class="form-label"> Detalle : </label>
            <input type="text" name="detalle_fp" value="{{ old('-') }}" class="form-control">

            <br>

            <button type="submit" class="btn btn-success">Guardar forma de pago</button>
            <a href="{{ route('formas_pago.index') }}" class="btn btn-danger text-end">Cancelar</a>
        </form>
        </div>
    </div>
@endsection