<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadosAsistenciaController;
use App\Http\Controllers\FormasPagoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodosLectivoController;
use App\Http\Controllers\TiposEmpleadoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\FacturaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.index');
});

Route::resource('empleados', EmpleadoController::class)->names('empleados');
Route::resource('estados_asistencia', EstadosAsistenciaController::class)->names('estados_asistencia');
Route::resource('formas_pago', FormasPagoController::class)->names('formas_pago');
Route::resource('horarios', HorarioController::class)->names('horarios');
Route::resource('materias', MateriaController::class)->names('materias');
Route::resource('periodos_lectivo', PeriodosLectivoController::class)->names('periodos_lectivo');
Route::resource('tipos_empleado', TiposEmpleadoController::class)->names('tipos_empleado');
Route::resource('alumnos', AlumnoController::class)->names('alumnos');
Route::resource('cuotas', CuotaController::class)->names('cuotas');
Route::get('cuotas/filtroalumno/{alumno}', [CuotaController::class, 'filtroalumno'])->name('cuotas.filtroalumno');
Route::post('facturas/storealumno', [FacturaController::class, 'storealumno'])->name('facturas.storealumno');
Route::get('facturas/createalumno', [FacturaController::class, 'createalumno'])->name('facturas.createalumno');
Route::post('obtenerCuotas', [FacturaController::class, 'obtenerCuotas']);
Route::resource('facturas', FacturaController::class)->names('facturas');
Route::resource('cajas', CajaController::class)->names('cajas');
Route::get('cajas/{caja}/close', [CajaController::class, 'close'])->name('cajas.close');


Route::get('/exportar-empleados-pdf', [EmpleadoController::class, 'exportarEmpleadosPDF'])->name('exportar-empleados-pdf');
Route::get('/exportar-empleados-excel', [EmpleadoController::class, 'exportarEmpleadosExcel'])->name('exportar-empleados-excel');

// Facturas
Route::get('/factura-pdf/{factura}', [FacturaController::class, 'facturaPDF'])->name('factura-pdf');

// Cuotas
Route::get('/cuotas-pag-pdf/{alumno}', [CuotaController::class, 'cuotasPagPDF'])->name('cuotas-pag-pdf');
Route::get('/cuotas-imp-pdf/{alumno}', [CuotaController::class, 'cuotasImpPDF'])->name('cuotas-imp-pdf');
