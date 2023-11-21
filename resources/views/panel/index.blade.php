@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1><center>BIENVENIDO A LA PLATAFORMA VIRTUAL DEL COLEGIO</center></h1>
    <img src="https://thumbs.dreamstime.com/b/entrada-de-la-escuela-cat%C3%B3lica-15239442.jpg" height="600" width="1050">
@stop

@section('content')
<style>
    /* Personaliza el estilo según tus preferencias */
    .color-square {
      width: 100px;
      height: 100px;
      margin: 10px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 24px;
      color: white;
    }
  </style>
<div class="row">
    <div class="col-md-4 mb-3 bg-primary">
      <div class="color-square bg-primary">1</div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="color-square bg-secondary">2</div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="color-square bg-success">3</div>
    </div>
    <div class="col-md-3 mb-3">
      <div class="color-square bg-danger">4</div>
    </div>
    <!-- Agrega más cuadrados según sea necesario -->
  </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
