<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Cuotas Impagadas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        .ticket {
            width: 400px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #000;
        }

        .header {
            text-align: center;
            font-weight: bold;
        }

        .info {
            margin-top: 10px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Informe de Asistencia</h1>
    <p>Fecha del informe: {{ $fechaInforme }}</p>

    <table>
        <thead>
            <tr>
                <th>Nombre del Alumno</th>
                <th>Curso//</th>
                <th>Presente//</th>
                <th>Ausente//</th>
                <th>Tarde//</th>
                <th>Justificado//</th>
                <th>Faltas</th>
                
            </tr>
        </thead>
        <tbody>
            @foreach($datosAsistencia as $asistencia)
                <tr>
                    <td>{{ $asistencia['alumno'] }}</td>
                    <td>{{ $asistencia['curso']}} {{ $asistencia['division']}}</td>
                    <td>{{ $asistencia['presente'] }}</td>
                    <td>{{ $asistencia['ausente'] }}</td>
                    <td>{{ $asistencia['tarde'] }}</td>
                    <td>{{ $asistencia['justificado'] }}</td>
                    <td>{{ $asistencia['faltas'] }}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
     @foreach($datosAsistencia as $asistencia)
                 <p>--------------------------------------------------------------------------------------------------------------------------</p>
                   <p style="text-align:right;">{{ $fechaInforme }}</p>
                    <h3>Sr Padres o Tutor: </h3>
                    <p>La direccion del colegio comunica usted que, el alumno/a: 
                    {{ $asistencia['alumno'] }}, DNI: {{$asistencia['dni']}} de {{ $asistencia['curso']}} {{ $asistencia['division']}} 
                    registra a la fecha {{ $asistencia['faltas'] }} inasistencias. Se recuerda que al llegar a las 15
                    inasistencias pierde su condicion de alumno regular y debe  solicitar la reincorporacion y abonar el costo 
                    correspondiente.</p>
                    <p style="text-align:right;">Atentamente: Dirección</p>
                                  
                
            @endforeach 
</body>
</html>