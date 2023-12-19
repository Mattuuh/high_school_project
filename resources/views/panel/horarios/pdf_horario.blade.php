<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        #titulo {
            width: 100vw;
            display: flex;
            justify-content: center;
        }
        
        @page { size: 40cm landscape; }
    </style>
    <title>Horario Colegial</title>
    <link rel="stylesheet" href="{{ public_path('vendor/adminlte/dist/css/adminlte.min.css') }}">
</head>
<body>

    <div id="titulo">
        <div class="">
            <h2>Horario</h2>
            <h3>Curso: {{ $curso->nombre }} "{{ $curso->division }}" - Ciclo {{ $curso->periodo_lectivo->modalidad }}</h3>    
        </div>
    </div>

    <table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <th scope="col">Hora</th>
            <th scope="col">Lunes</th>
            <th scope="col">Martes</th>
            <th scope="col">Miércoles</th>
            <th scope="col">Jueves</th>
            <th scope="col">Viernes</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($horariosAgrupados as $hora => $dias)
            <tr>
                <td>{{ $dataHora[$hora]['hora_inicio'] }} - {{ $dataHora[$hora]['hora_fin'] }}</td>
                @for ($i = 1; $i <= 5; $i++) 
                    <td>
                        @if (isset($dias[$i]))
                            <b>{{ $dias[$i]['materia'] }}</b><br>
                            {{ $dias[$i]['docente'] }}
                        @endif
                    </td>
                @endfor
            </tr>
        @endforeach
        {{-- @foreach ($horarios as $horario)
            <td>{{ $horario->id }}</td>
        @endforeach --}}
    </tbody>
</table>

</body>
</html>
