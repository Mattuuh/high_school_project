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
                            {{ $dias[$i]['materia'] }} <br>
                            {{ $dias[$i]['docente'] }}
                        @endif
                    </td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>