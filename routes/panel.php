<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadosAsistenciaController;
use App\Http\Controllers\FormasPagoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodosLectivoController;
use App\Http\Controllers\TiposEmpleadoController;
use App\Http\Controllers\AlumnoController;
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