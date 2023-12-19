<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asistencia_alumno;
use App\Models\Curso;
use App\Models\Estados_asistencia;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Dompdf\Adapter\PDFLib;

class AsistenciaAlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::orderBy('id_curso', 'asc')->get();
        $estados_asistencia = Estados_asistencia::all();
        
        return view('panel.asistencia_alumno.index', compact('alumnos', 'estados_asistencia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'id_estado' => 'numeric'
        ]);
        $alumno = Alumno::findOrFail($id);
        $validated['id_alumno'] = intval($alumno->id);
        $validated['fecha'] = strval(now()->format('Y-m-d'));
        $estado = Estados_asistencia::findOrFail($request->id_estado);
        $validated['id_estado'] = intval($estado->id);
        //dd($validated);

        Asistencia_alumno::create($validated);
        //DB::table('asistencia_alumnos')->insert($validated);
        
        return redirect()->route('asistencia_alumno.index')->with('status','Asistencia registrada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asistencia_alumno $asistencia_alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asistencia_alumno $asistencia_alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_alumno, $fecha)
    {
        $asistencia = Asistencia_alumno::where('id_alumno', $id_alumno)->where('fecha', $fecha)->first();
        $id_estado = intval($request->input('id_estado'));
        //$asistencia->update($request->all());

        DB::table('asistencia_alumnos')
            ->where('id_alumno', $id_alumno)
            ->where('fecha', $fecha)
            ->update(['id_estado' => $id_estado]);
        

        return back()->with('status','Asistencia actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia_alumno $asistencia_alumno)
    {
        //
    }

    public function guardar_datos(Request $request)
    {
        // Procesa los datos enviados por el formulario
        $datosSeleccionados = $request->input('seleccion');
        foreach ($datosSeleccionados as $alumnoId => $asistenciaId) {
            echo 'Alumno: '.$alumnoId.' Asistencia: '.$asistenciaId.'<br>';
            $create['id_alumno'] = Alumno::findOrFail($alumnoId)->id;
            $create['id_estado'] = Estados_asistencia::findOrFail($asistenciaId)->id;
            $create['fecha'] = strval(now()->format('Y-m-d'));
            Asistencia_alumno::create($create);
        }

        // Realiza las acciones necesarias con los datos seleccionados

        // Redirige o realiza alguna otra acción
        return redirect()->back()->with('success', 'Datos guardados exitosamente');
    }

    public function listadoalumno() {
        $alumnos = Alumno::select('id', 'nombre', 'apellido', 'dni')->get();
        $asistencias = Asistencia_alumno::all();
        $cursos = Curso::all();
        //dd($asistencias);
        return view('panel.asistencia_alumno.listadoalumno', compact('asistencias','cursos'));
    }
    public function detalleAsistencia(Alumno $alumno) {
        $alumno = Alumno::findOrFail($alumno->id);
        $asistencias = Asistencia_alumno::where('id_alumno',$alumno->id)->get();
        $presente = 0;
        $ausente = 0;
        $justificado = 0;
        $tarde = 0;
        $inasistencia=0;
        foreach ($asistencias as $asistencia) {
            switch ($asistencia->id_estado) {
                case 1:
                    $presente++;
                    break;
                case 2:
                    $ausente++;
                   
                    break;
                case 3:
                    $justificado++;
                    break;
                case 4:
                    $tarde++;
                     
                    break;
            }
            $inasistencia=$ausente+$tarde/2;
        }
        return view('panel.asistencia_alumno.detalle-asistencia', compact('alumno', 'asistencias', 'presente', 'ausente', 'justificado', 'tarde','inasistencia'));
    }

    public function graficosAsistencia($curso) {
        $curso = $curso != 0 ? Curso::findOrFail($curso) : null;
        // Si se hace una peticion AJAX
        if(request()->ajax()) {
            $labels = [];
            $counts = [];

            $alumnos = $curso == null ? Alumno::all() : Alumno::where('id_curso', $curso->id)->get();
            $asistenciaAlumnos = [];
            foreach ($alumnos as $alumno) {
                $presenteConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 1)->get();
                $presente = $presenteConsulta->count();
                $ausenteConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 2)->get();
                $ausente = $ausenteConsulta->count();
                $tardeConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 3)->get();
                $tarde = $tardeConsulta->count();
                $justificadoConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 4)->get();
                $justificado = $justificadoConsulta->count();

                $asistenciaAlumnos[] = [
                    'alumno' => $alumno->nombre .' '. $alumno->apellido,
                    'presente' => $presente,
                    'ausente' => $ausente,
                    'tarde' => $tarde,
                    'justificado' => $justificado,
                ];
                
            }

            foreach($asistenciaAlumnos as $asistenciaAlumno) {

                $labels[] = $asistenciaAlumno['alumno'];
                $counts[] = $asistenciaAlumno['presente'];
            }
            $response = [
                'success' => true,
                'data' => [$labels, $counts]
            ];
            return json_encode($response);
        }
        return view('panel.asistencia_alumno.grafico-asistencia');
        
       }
       // En tu controlador
// En tu controlador
public function obtenerDatosAsistencia($curso) {
    $curso = $curso != 0 ? Curso::findOrFail($curso) : null;
    $alumnos = $curso != null ? Alumno::where('id_curso', $curso->id)->with('curso')->orderBy('id_curso')->get() : Alumno::with('curso')->orderBy('id_curso')->get();
    $asistenciaAlumnos = [];

    foreach ($alumnos as $alumno) {
        $ausenteConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 2)->count();
        $tardeConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 4)->count();
        $faltas = $ausenteConsulta + $tardeConsulta / 2;

        if ($faltas > 14) {
            $presenteConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 1)->count();
            $justificadoConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 3)->count();

            $asistenciaAlumnos[] = [
                'alumno' => $alumno->nombre .' '. $alumno->apellido,
                'dni' => $alumno->dni,
                'curso' => $alumno->curso->nombre,
                'division' => $alumno->curso->division,
                'presente' => $presenteConsulta,
                'ausente' => $ausenteConsulta,
                'tarde' => $tardeConsulta,
                'justificado' => $justificadoConsulta,
                'faltas' => $faltas,
            ];
        }
    }

    return $asistenciaAlumnos;
}


// Luego, en la función que genera el PDF
public function alumnolibrePDF($curso) {
    $fechaInforme = now();
    $datosAsistencia = $this->obtenerDatosAsistencia($curso);

    $pdf = FacadePdf::loadView('panel.asistencia_alumno.pdf_alumnos_libres', compact('datosAsistencia', 'fechaInforme'));
    $pdf->render();
    // visualizaremos el pdf en el navegador
    return $pdf->stream('alumnos_libres.pdf');
    //return $pdf->download('alumnos_libres');
}
public function obtenerDatosAsistencia2($curso) {
    $curso = $curso != 0 ? Curso::findOrFail($curso) : null;
    $alumnos = $curso != null ? Alumno::where('id_curso', $curso->id)->with('curso')->orderBy('id_curso')->get() : Alumno::with('curso')->orderBy('id_curso')->get();
    $asistenciaAlumnos = [];

    foreach ($alumnos as $alumno) {
        $ausenteConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 2)->count();
        $tardeConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 4)->count();
        $faltas = $ausenteConsulta + $tardeConsulta / 2;

        if ($faltas > 9) {
            $presenteConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 1)->count();
            $justificadoConsulta = Asistencia_alumno::where('id_alumno', $alumno->id)->where('id_estado', 3)->count();

            $asistenciaAlumnos[] = [
                'alumno' => $alumno->nombre .' '. $alumno->apellido,
                'dni' => $alumno->dni,
                'curso' => $alumno->curso->nombre,
                'division' => $alumno->curso->division,
                'presente' => $presenteConsulta,
                'ausente' => $ausenteConsulta,
                'tarde' => $tardeConsulta,
                'justificado' => $justificadoConsulta,
                'faltas' => $faltas,
            ];
        }
    }

    return $asistenciaAlumnos;
}


public function alumnocasilibrePDF($curso) {
    $fechaInforme = now();
    $datosAsistencia = $this->obtenerDatosAsistencia2($curso);

    $pdf = FacadePdf::loadView('panel.asistencia_alumno.pdf_alumnos_casilibres', compact('datosAsistencia', 'fechaInforme'));
    $pdf->render();
    // visualizaremos el pdf en el navegador
    return $pdf->stream('alumnos_casi_libres.pdf');
    //return $pdf->download('alumnos_casi_libres.pdf');
}

}
