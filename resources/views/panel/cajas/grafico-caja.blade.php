@extends('adminlte::page')

@section('title', 'Gráfico de Línea')

{{-- Activamos el plugin de Chartjs --}}
@section('plugins.Chartjs', true)

@section('content_header')
    <h1>Datos Estadísticos de Caja</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 mb-2">
                <label for="filtroFecha">Filtrar fecha:</label>
                <div class="row">
                    <div class="col-8 pr-0">
                        <div class="row">
                            <div class="col-6 p-0">
                                <select name="fechaMes" id="filtroMes" class="form-control">
                                    <option value="0">Todos</option>
                                    <option value="1">Enero</option>
                                    <option value="2">Febrero</option>
                                    <option value="3">Marzo</option>
                                    <option value="4">Abril</option>
                                    <option value="5">Mayo</option>
                                    <option value="6">Junio</option>
                                    <option value="7">Julio</option>
                                    <option value="8">Agosto</option>
                                    <option value="9">Septiembre</option>
                                    <option value="10">Octubre</option>
                                    <option value="11">Noviembre</option>
                                    <option value="12">Diciembre</option>
                                </select>
                            </div>
                            <div class="col-6 pl-0">
                                <select name="fechaAnio" id="filtroAnio" class="form-control">
                                    <option value="0">Todos</option>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 p-0">
                        <button type="button" class="btn btn-success" id="botonFecha"><i class='fas fa-search'></i></button>
                    </div>
                </div>
            </div>

            <!-- LINE CHART -->
            <div class="col-md-11 col-11">
                <div class="card">
                    <div class="card-header bg-success text-white">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Gráfico de Línea</strong>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="lineChart"></canvas>
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
            /* const lineChart = document.getElementById('lineChart').getContext('2d');
            const configDataLineChart = $('#config_linechart');

            // Peticion AJAX para extraer datos de la BD y graficar
            $.get(location.href, function(response) {
                response = JSON.parse(response);

                // Si hay éxito en la petición
                if(response.success) {

                    let labels = response.data[0];
                    let count = response.data[1];
                    console.log(count)

                    // Para Graficar el Gráfico de Línea (LineChart)
                    graficar(lineChart, 'line', labels, count, 'Monto de Cierre por Dia', configDataLineChart);
                } else {
                    console.log(response.message);
                }
            })
            .fail(function(error) {
                console.log(error.statusText, error.status);
            }); */

            const lineChart = document.getElementById('lineChart').getContext('2d');
            const configDataLineChart = $('#config_linechart');

            function obtenerDatos(filtroMes, filtroAnio) {
                // Peticion AJAX para extraer datos de la BD y graficar
                $.get(location.href, { mes: filtroMes, anio: filtroAnio }, function(response) {
                    response = JSON.parse(response);

                    // Si hay éxito en la petición
                    if(response.success) {
                        let labels = response.data[0];
                        let count = response.data[1];

                        // Para Graficar el Gráfico de Línea (LineChart)
                        graficar(lineChart, 'line', labels, count, 'Monto de Cierre por Días', configDataLineChart);
                    } else {
                        console.log(response.message);
                    }
                })
                .fail(function(error) {
                    console.log(error.statusText, error.status);
                });
            }

            // Escuchar el evento de clic en el botón de búsqueda
            $('#botonFecha').on('click', function() {
                const filtroMes = $('#filtroMes').val();
                const filtroAnio = $('#filtroAnio').val();

                // Obtener y actualizar los datos con los nuevos filtros
                obtenerDatos(filtroMes, filtroAnio);
            });

            // Al cargar la página, obtén y muestra los datos por defecto
            obtenerDatos(0, 0);

            // Grafica el gráfico de línea de ChartJs
            function graficar(context, typeGraphic, label, count, title, inputData) {

                // Inicio de la configuración de ChartJs
                let configChart = `{
                    "type": "${typeGraphic}",
                    "data": {
                        "labels": ${ JSON.stringify(label) },
                        "datasets": [{
                            "label": "${title}",
                            "data": ${ JSON.stringify(count) },
                            "backgroundColor": "rgba(75, 192, 192, 0.2)",
                            "borderColor": "rgba(75, 192, 192, 1)",
                            "borderWidth": 2,
                            "fill": false
                        }]
                    },
                    "options": {
                        "scales": {
                            "yAxes": [{
                                "ticks": {
                                    "beginAtZero": true
                                }
                            }]
                        }
                    }
                }`;

                // Guardamos el string en el input data del formulario correspondiente
                inputData.val(configChart);

                // JSON.parse(string) -> convierte el string a JSON
                let myChart = new Chart(context, JSON.parse(configChart));
            }
        });
    </script>
@stop
