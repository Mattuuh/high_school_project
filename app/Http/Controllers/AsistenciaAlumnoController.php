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
        $alumnos = Alumno::all();
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
    public function update(Request $request, Asistencia_alumno $asistencia_alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asistencia_alumno $asistencia_alumno)
    {
        //
    }

    public function listadoalumno() {
        $alumnos = Alumno::select('id', 'nombre', 'apellido', 'dni')->get();
        $asistencias = Asistencia_alumno::whereDate('fecha',now()->format('Y-m-d'))->get();
        //dd($asistencias);
        return view('panel.asistencia_alumno.listadoalumno', compact('asistencias'));
    }
}
