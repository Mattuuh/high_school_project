@extends('adminlte::page')

@section('plugins.Datatables', true)

@can('registro-pago')
    @section('title', 'Registro de pagos')
    @section('content_header')
    <h1>Lista de alumnos y cuotas</h1>
    @stop
@elsecan('registro-alumno')
    @section('title', 'Registro de alumnos')
    @section('content_header')
    <h1>Lista de Alumnos</h1>
    @stop
@endcan

@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="col-12 mb-3">
        @can('registro-alumno')
            <a href="{{ route('alumno.create') }}" class="btn btn-success text-uppercase">
                Nuevo alumno
            </a>
        @endcan
    </div>
        <a href="{{ route('alumnos.create') }}" class="btn btn-success">Agregar nuevo pago</a>
    @if ($alumnos->count())
        <table class="table table-striped mt-1" id="tabla-alumnos">
            <thead class="table-dark">
                <tr>
                    <th>Legajo</th>
                    <th>Nombre y Apellido</th>
                    <th>Dni</th>
                    {{-- <th>Cuota</th> --}}
                    <th>Acciones</th>
                </tr>    
            </thead>
            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->id }}</td>
                        <td>{{ $alumno->nombre_alu }} {{ $alumno->apellido_alu }}</td>
                        <td>{{ $alumno->dni_alu }}</td>
                        {{-- @can('registro-pago')
                        <td>{{ $alumno->cuota }}</td>
                        @endcan --}}
                        <td>
                            <a class="btn btn-success btn-sm" href="{{ route('alumnos.show', $alumno->id) }}">Ver</a>
                            <a href="{{ route('alumnos.edit', $alumno->id) }}" class="btn btn-dark btn-sm">Editar</a>
                            <form action="{{ route('alumnos.destroy', $alumno->id) }}" method="POST">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h4>No hay empleados cargados!</h4>
    @endif
@endsection

{{-- Importacion de Archivos CSS --}}
@section('css')
    
@stop

{{-- Importacion de Archivos JS --}}
@section('js')

    {{-- La funcion asset() es una funcion de Laravel PHP que nos dirige a la carpeta "public" --}}
    <script src="{{ asset('js/alumnos.js') }}"></script>
@stop