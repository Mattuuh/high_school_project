<?php

use App\Http\Middleware\Authenticate;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\Estados_asistenciaController;
use App\Http\Controllers\Formas_pagoController;
use App\Http\Controllers\HorariosController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\Periodos_lectivoController;
use App\Http\Controllers\Tipos_empleadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Authenticate;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('empleados.index');
});

Auth::routes();

Route::resource('empleados', EmpleadosController::class)->names('empleados')->middleware(Authenticate::class);
Route::resource('estados_asistencia', Estados_asistenciaController::class)->names('estados_asistencia')->middleware(Authenticate::class);
Route::resource('formas_pago', Formas_pagoController::class)->names('formas_pago')->middleware(Authenticate::class);
Route::resource('horarios', HorariosController::class)->names('horarios')->middleware(Authenticate::class);
Route::resource('materias', MateriasController::class)->names('materias')->middleware(Authenticate::class);
Route::resource('periodos_lectivo', Periodos_lectivoController::class)->names('periodos_lectivo')->middleware(Authenticate::class);
Route::resource('tipos_empleado', Tipos_empleadoController::class)->names('tipos_empleado')->middleware(Authenticate::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(Authenticate::class);
