<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket de Pago N° {{ $factura->id }}</title>
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
        <h3>Colegio San Juan de las Flores</h3>
        <p>Desde 2013</p>
    </div>

    <div class="info">
        <p><strong>Alumno:</strong> {{ $factura->alumno->nombre }} {{ $factura->alumno->apellido }}</p>
        <p><strong>Fecha de Pago:</strong> {{ $factura->created_at->format('d/m/Y H:i:s') }}</p>
        <p><strong>Cuota:</strong> {{ $factura->cuota->mes }}</p>
        <p><strong>Monto:</strong> ${{ $factura->cuota->monto }}</p>
    </div>

    <div class="footer">
        <p>¡Gracias por tu pago!</p>
    </div>
</div>

</body>
</html>