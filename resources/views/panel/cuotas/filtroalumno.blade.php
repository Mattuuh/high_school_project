@extends('adminlte::page')

@section('plugins.Datatables', true)

@section('title', 'Cuotas')
    
@section('content')
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="container w-25 pb-2">
        
        <div class="card">
            <div class="card-body">
                <h2 class="modal-title" id="modalTitle">Alumno # {{ $alumno->id }}</h2>
                
                <label for="nombre" class="form-label">Nombre:</label>
                <input id="nombre" class="form-control" value="{{ $alumno->nombre }}" readonly>
                <label for="apellido" class="form-label">Apellido:</label>
                <input id="apellido" class="form-control" value="{{ $alumno->apellido }}" readonly>
                <label for="dni" class="form-label">Dni:</label>
                <input id="dni" class="form-control" value="{{ $alumno->dni }}" readonly>
                <label for="cuotasImpag" class="form-label">Cuotas Impagas:</label>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('cuotas-imp-pdf', $alumno) }}" class="btn btn-info" title="PDF" target="_blank">
                            <i class="fas fa-file-pdf"></i> Imprimir informe
                        </a>
                    </div>
                </div>
                <label for="cuotasPag" class="form-label">Cuotas Pagadas:</label>
                <div class="row">
                    <div class="col-12">
                        <a href="{{ route('cuotas-pag-pdf', $alumno) }}" class="btn btn-info" title="PDF" target="_blank">
                            <i class="fas fa-file-pdf"></i> Imprimir informe
                        </a>
                    </div>
                </div>
                
                <div class="row mt-2">
                    <div class="col-12 d-md-flex justify-content-md-end">
                        <a href="{{ route('cuotas.index') }}" class="btn btn-danger text-end">Cancelar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection