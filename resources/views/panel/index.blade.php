@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Programando con Laravel 10</h1>
@stop

@section('content')
    <p>HOLA MUNDO DE ADMIN LTE</p>
    <div class="slider">Slider</div>
    <div class="container">Imagenes con contenido de la sidebar</div>
    <div class="container">Calendario</div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
