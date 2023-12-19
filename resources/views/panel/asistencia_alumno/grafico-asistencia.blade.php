@extends('adminlte::page')

@section('title', 'Graficos')

{{-- Activamos el plugin de Chartjs --}}
@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Datos Estadisticos de Alumnos por Curso</h1>
@stop

@section('content')
    <div class="container-fluid">
    <div class="col-2">
                <label for="filtroSelect">Filtrar curso:</label>
                <select id="filtroSelect" class="form-control">
                    <option value="todos">Todos</option>
                </select>
            </div>
        <div class="row">

            <!-- BAR CHART -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Cantidad de Alumnos por curso</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- PIE CHART -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-danger text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Distribucion de Alumnos</strong>
                        </div>
                    </div>
                    <div class="card-body h-50">
                        <canvas id="pieChart"></canvas>
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
        $(function() {
            const barChart = document.getElementById('barChart').getContext('2d');
            const pieChart = document.getElementById('pieChart').getContext('2d');

            const configDataBarChart = $('#config_barchart');
            const configDataPieChart = $('#config_piechart')

            // Peticion AJAX para extraer datos de la BD y graficar
            $.get(location.href, function(response) {
                response = JSON.parse(response);

                // Si hay exito en la petición
                if(response.success) {

                    let labels = response.data[0];
                    let count = response.data[1];

                    // Para Graficar el Diagrama de Barras (BarChart)
                    graficar(barChart, 'bar', labels, count, 'Cantidad de faltas', configDataBarChart);

                    // Para Graficar el Diagrama de Torta (PieChart)
                    graficar(pieChart, 'pie', labels, count, 'Cantidad de Alumnos por Curso', configDataPieChart);
                } else {
                    console.log(response.message);
                }
            })
            .fail(function(error) {
                console.log(error.statusText, error.status);
            });

            // Grafica cualquier gráfico estadistico de ChartJs
            function graficar(context, typeGraphic, label, count, title, inputData) {

                // Inicio de la configuracion de ChartJs
                let configChart = `{
                    "type": "${typeGraphic}",
                    "data": {
                        "labels": ${ JSON.stringify(label) },
                        "datasets": [{
                            "label": "${title}",
                            "data": ${ JSON.stringify(count) },
                            "backgroundColor": [
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(53, 62, 135, 0.2)",
                                "rgba(245, 40, 145, 0.8)",
                                "rgba(39, 63, 245, 0.8)",
                                "rgba(39, 245, 238, 0.8)",
                                "rgba(118, 39, 245, 0.8)",
                                "rgba(245, 158, 8, 0.9)",
                                "rgba(245, 223, 8, 0.9)",
                                "rgba(245, 25, 8, 0.9)",
                                "rgba(157, 39, 245, 0.45)",
                                "rgba(54, 64, 255, 0.49)",
                                "rgba(39, 245, 45, 0.8)"

                            ],
                            "borderColor": [
                                "rgba(255, 99, 132, 1)",
                                "rgba(54, 162, 235, 1)",
                                "rgba(53, 62, 135, 0.2)",
                                "rgba(245, 40, 145, 0.8)",
                                "rgba(39, 63, 245, 0.8)",
                                "rgba(39, 245, 238, 0.8)",
                                "rgba(118, 39, 245, 0.8)",
                                "rgba(245, 158, 8, 0.9)",
                                "rgba(245, 223, 8, 0.9)",
                                "rgba(245, 25, 8, 0.9)",
                                "rgba(157, 39, 245, 0.45)",
                                "rgba(54, 64, 255, 0.49)",
                               "rgba(39, 245, 45, 0.8)" 

                            ],
                            "borderWidth": 2
                        }]
                    }`;

                // Si es alguno de estos graficos, iniciarán en el punto 0
                if(typeGraphic === 'bar' || typeGraphic === 'horizontalBar') {
                    configChart += `
                    ,"options": {
                        "scales": {
                            "xAxes": [{
                                "ticks": {
                                    "beginAtZero": true
                                }
                            }],
                            "yAxes": [{
                                "ticks": {
                                    "beginAtZero": true
                                }
                            }]
                        }
                    }
                    `;
                }

                configChart += '}'; // Cierre del JSON

                // Guardamos el string en el input data del formulario correspondiente
                inputData.val(configChart);

                // JSON.parse(string) -> convierte el string a JSON
                let myChart = new Chart(context, JSON.parse(configChart));
            }
        });
    </script>
@stop
