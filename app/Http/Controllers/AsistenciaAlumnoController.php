<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Asistencia_alumno;
use App\Models\Estados_asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //dd($asistencias);
        return view('panel.asistencia_alumno.listadoalumno', compact('asistencias'));
    }
    public function detalleAsistencia(Alumno $alumno) {
        $alumno = Alumno::findOrFail($alumno->id);
        $asistencias = Asistencia_alumno::where('id_alumno',$alumno->id)->get();
        $presente = 0;
        $ausente = 0;
        $justificado = 0;
        $tarde = 0;
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
        }
        return view('panel.asistencia_alumno.detalle-asistencia', compact('alumno', 'asistencias', 'presente', 'ausente', 'justificado', 'tarde'));
    }
    /* public function graficosAsistencia() {

        // Si se hace una peticion AJAX
        if(request()->ajax()) {
            $labels = [];
            $counts = [];

            $alumnos = Alumno::all();
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

                $labels[] =  $asistenciaAlumno->alumno;
                $counts[] = $asistenciaAlumno->presente;
            }
            $response = [
                'success' => true,
                'data' => [$labels, $counts]
            ];
            return json_encode($response);
        }
        return view('panel.asistencia_alumno.grafico-asistencia');
       } */
}
