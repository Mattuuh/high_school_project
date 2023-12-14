<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\EstadosAsistenciaController;
use App\Http\Controllers\FormasPagoController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\HoraController;
use App\Http\Controllers\MateriaController;
use App\Http\Controllers\PeriodosLectivoController;
use App\Http\Controllers\TiposEmpleadoController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AsistenciaAlumnoController;
use App\Http\Controllers\CajaController;
use App\Http\Controllers\CuotaBaseController;
use App\Http\Controllers\CuotaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocentesMateriaController;
use App\Http\Controllers\FacturaBaseController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\RegistroAcademicoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('panel.index');
});

Route::resource('empleados', EmpleadoController::class)->names('empleados');
Route::resource('estados_asistencia', EstadosAsistenciaController::class)->names('estados_asistencia');
Route::resource('formas_pago', FormasPagoController::class)->names('formas_pago');
Route::resource('horas', HoraController::class)->names('horas');
Route::resource('horarios', HorarioController::class)->names('horarios');
Route::resource('registro_academico', RegistroAcademicoController::class)->names('registro_academico');
Route::resource('materias', MateriaController::class)->names('materias');
Route::resource('periodos_lectivo', PeriodosLectivoController::class)->names('periodos_lectivo');
Route::resource('tipos_empleado', TiposEmpleadoController::class)->names('tipos_empleado');
Route::resource('alumnos', AlumnoController::class)->names('alumnos');
Route::resource('cuotas', CuotaController::class)->names('cuotas');
Route::resource('cuotas_base', CuotaBaseController::class)->names('cuotasbase');
Route::get('cuotas/filtroalumno/{alumno}', [CuotaController::class, 'filtroalumno'])->name('cuotas.filtroalumno');
Route::resource('facturas', FacturaController::class)->names('facturas');
Route::resource('facturasbase', FacturaBaseController::class)->names('facturasbase');
Route::resource('cajas', CajaController::class)->names('cajas');
Route::get('cajas/{caja}/close', [CajaController::class, 'close'])->name('cajas.close');
// Route::get('graficos-alumnos',[AlumnoController::class,'graficosalumnosincriptos'])->name('graficos-salumnos');
Route::resource('cursos', CursoController::class)->names('cursos');
Route::get('graficos-alumnos',[CursoController::class,'graficosAlumnosxCurso'])->name('graficos-alumnos');
Route::get('asistencia_alumno', [AsistenciaAlumnoController::class, 'index'])->name('asistencia_alumno.index');
Route::post('asistencia_alumno/{id_alumno}', [AsistenciaAlumnoController::class, 'store'])->name('asistencia_alumno.store');
Route::get('asistencia_alumno/listadoalumno', [AsistenciaAlumnoController::class, 'listadoalumno'])->name('asistencia_alumno.listadoalumno');


Route::post('asistencia_alumno', [AsistenciaAlumnoController::class, 'guardar_datos'])->name('asistencia_alumno.guardar_datos');
// Route::resource('asistencia_alumno', AsistenciaAlumnoController::class)->names('asistencia_alumno');
Route::resource('docentes_materia', DocentesMateriaController::class)->names('docentes_materia');



Route::get('/exportar-empleados-pdf', [EmpleadoController::class, 'exportarEmpleadosPDF'])->name('exportar-empleados-pdf');
Route::get('/exportar-empleados-excel', [EmpleadoController::class, 'exportarEmpleadosExcel'])->name('exportar-empleados-excel');

// Facturas
Route::get('/factura-pdf/{factura}', [FacturaController::class, 'facturaPDF'])->name('factura-pdf');

// Cuotas
Route::get('/cuotas-pag-pdf/{alumno}', [CuotaController::class, 'cuotasPagPDF'])->name('cuotas-pag-pdf');
Route::get('/cuotas-imp-pdf/{alumno}', [CuotaController::class, 'cuotasImpPDF'])->name('cuotas-imp-pdf');
Route::get('/informe-inscriptos-pdf', [CuotaController::class, 'informeIncriptosPDF'])->name('informe-inscriptos-pdf');
Route::get('/informe-no-inscriptos-pdf', [CuotaController::class, 'informeNoInscriptosPDF'])->name('informe-no-inscriptos-pdf');
Route::get('/infrome-ins-no-inscriptos-pdf', [CuotaController::class, 'informeInsNoInsPDF'])->name('infrome-ins-no-inscriptos-pdf');

// Registro academico
Route::get('registro_academico/{alumno}/registro_nota', [RegistroAcademicoController::class, 'registro_nota'])->name('registro_academico.registro_nota');

// Empleados
Route::get('grafico',[EmpleadoController::class,'graficosEmpleadosxTipo'])->name('grafico');
