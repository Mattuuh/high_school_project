@extends('adminlte::page')

@section('title', 'Vista del Empleado #' . $product->id)

@section('content')

<div class="bg-secondary-subtle min-vh-100 pt-4">
    <div class="container w-25 pb-2 border rounded-2 bg-light">
    <h1>Producto #{{ $product->id }}</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="" novalidate>
        @csrf @method('PUT')

        <label for="name" class="form-label">Nombre: </label>
        <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control">

        <br>

        <label for="description" class="form-label">Descripcion: </label> <br>
        <textarea name="description" cols="30" rows="4" class="form-control">{{ old('description', $product->descripcion) }}</textarea>

        <br>

        <label for="unit_price" class="form-label">Precio Unitario: </label>
        <input type="number" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}" class="form-control">

        <br>

        <label for="stock" class="form-label">Stock: </label>
        <input type="number" name="stock" value="{{ old('stock', $product->stock) }}" class="form-control">

        <br>

        <a href="{{ route('products.index') }}" class="btn btn-danger">Volver</a>
    </form>
    </div>
</div>
@endsection