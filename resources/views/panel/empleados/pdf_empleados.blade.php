<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte PDF</title>
    <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">

    <style>
        @page { size: 40cm landscape; }
    </style>
</head>
<body>
    <h3 class="text-center"> Empleados </h3>
    <table class="table table-striped w-100">
        <thead class="bg-primary text-center text-white">
            <tr>
                <th scope="col" class="text-uppercase">Legajo</th>
                <th scope="col" class="text-uppercase">Nombre y Apellido</th>
                <th scope="col" class="text-uppercase">Dni </th>
                <th scope="col" class="text-uppercase">Telefono</th>
                <th scope="col" class="text-uppercase">Domicilio</th>
                <th scope="col" class="text-uppercase">Email</th>
                <th scope="col" class="text-uppercase">Tipo de Empleado</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->legajo_emp }}</td>
                    <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                    <td>{{ $empleado->dni }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->domicilio }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->tipo_empleado->nombre_te }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>