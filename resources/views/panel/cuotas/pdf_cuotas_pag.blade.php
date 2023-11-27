<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe de Cuotas Pagadas</title>
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

<div class="ticket">
    <div class="header">
        <h3>Colegio San Juan</h3>
        <p>Desde 2013</p>
    </div>

    <div class="info">
        <p><strong>Alumno:</strong> {{ $alumno->nombre }} {{ $alumno->apellido }}</p>
        <p><b>Dni:</b> {{ $alumno->dni }}</p>
        <p><strong>Fecha de Informe:</strong> {{ now()->format('d/m/Y H:i:s') }}</p>
        <p><strong>Cuotas pagadas:</strong></p>
        <ul>
            @if ($cuotas != null)
                @foreach ($cuotas as $cuota)
                <li>{{ $cuota->mes }}</li>
                @endforeach
            @else
                --- No hay cuotas pagadas ---
            @endif
            
        </ul>
    </div>

    <div class="footer">
        <p>-------------</p>
    </div>
</div>

</body>
</html>