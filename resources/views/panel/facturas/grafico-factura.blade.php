@extends('adminlte::page')

@section('title', 'Graficos')

{{-- Activamos el plugin de Chartjs --}}
@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Tendencia de Ingresos</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">

       
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Ingresos Diarios:</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="graficoIngresosDia"></canvas>
                    </div>
                </div>
            </div>
           
        
    </div>

           
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        // Configurar el contexto del gráfico
        var ctx = document.getElementById('graficoIngresosDia').getContext('2d');

        // Configurar los datos del gráfico
        var data = {
            labels: @json($fechas),
            datasets: [{
                label: 'Ingresos',
                data: @json($montos),
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1,
                fill: false,
            }]
        };

        // Configurar las opciones del gráfico
        var options = {
            scales: {
                x: [{
                    type: 'time',
                    time: {
                        unit: 'day',
                        displayFormats: {
                            day: 'MMM D',
                        },
                    },
                    distribution: 'linear',
                }],
                y: [{
                    ticks: {
                        beginAtZero: true,
                    },
                }],
            },
        };

        // Crear el gráfico de línea
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: options,
        });
    </script>




@stop
   


   