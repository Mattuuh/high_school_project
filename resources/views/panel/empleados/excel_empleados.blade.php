<table>
    <thead>
        <tr>
            <th>Legajo</th>
            <th>Nombre y Apellido</th>
            <th>Dni </th>
            <th>Telefono</th>
            <th>Domicilio</th>
            <th>Email</th>
            <th>Tipos de Empleado</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->legajo_emp }}</td>
                <td>{{ $empleado->nombre }} {{ $empleado->apellido }}</td>
                <td>{{ $empleado->dni  }}</td>
                <td>{{ $empleado->telefono }}</td>
                <td>{{ $empleado->domicilio }}</td>
                <td>{{ $empleado->email }}</td>
                <td>{{ $empleado->tipo_empleado->nombre_te }}</td>
            </tr>
        @endforeach
    </tbody>
</table>