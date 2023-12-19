<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Docentes_materia;
use App\Models\Horario;
use App\Models\Instancia;
use App\Models\Materia;
use App\Models\RegistroAcademico;
use Illuminate\Http\Request;

class RegistroAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$registros = RegistroAcademico::with('alumno','instancia','asignaturas')->get();
        $alumnos = Alumno::all();
        //dd($registro);
        return view('panel.registro_academico.index',compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.registro_academico.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->all();
        $materias = $request->input('notas');
        $instancias = $request->input('instancia');
        $id_alumno = $request->input('id_alumno');
        $fecha = now()->format('Y-m-d');
        //dd($validated);

        foreach ($materias as $idDocxMat => $nota) {
            RegistroAcademico::create([
                'id_alumno' => $id_alumno,
                'id_docxmat' => $idDocxMat,
                'nota' => $nota,
                'fecha' => $fecha,
                'id_instancia' => $instancias[$idDocxMat]
            ]);
        }

        return redirect()->route('registro_academico.index')->with('status','Registro cargado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistroAcademico $registroAcademico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistroAcademico $registroAcademico)
    {
        $registroAcademico = RegistroAcademico::findOrFail($registroAcademico->id);
        return view('panel.registro_academico.edit', ['registroAcademico'=>$registroAcademico]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistroAcademico $registroAcademico)
    {
        $registroAcademico = RegistroAcademico::findOrFail($registroAcademico->id);

        $validated = $request->all();

        $registroAcademico->update($validated);

        return back()->with('status','Registro actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistroAcademico $registroAcademico)
    {
        //Busqueda del alumno
        $registroAcademico = RegistroAcademico::findOrFail($registroAcademico->id);

        //Eliminacion del alumno
        $registroAcademico->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('registro_academico.index')->with('status', 'Registro eliminado satifactoriamente!');
    }
    public function registro_nota(Alumno $alumno)
    {
        $alumno = Alumno::findOrFail($alumno->id);
        $idCurso = Curso::findOrFail($alumno->id_curso)->id;
        $idMaterias = Horario::where('curso', $idCurso)->distinct()->get(['materia']);
        $idDocentes = Horario::where('curso', $idCurso)->distinct()->get(['docente']);
        $materias = Docentes_materia::whereIn('id_materia', $idMaterias)->whereIn('id_docente', $idDocentes)->get();
        $instancias = Instancia::all();
        
        return view('panel.registro_academico.registro_nota', compact('alumno', 'materias', 'instancias'));
    }
    public function listadoNotas(Alumno $alumno)
    {
        $alumno = Alumno::findOrFail($alumno->id);
        $registros_academico = RegistroAcademico::where('id_alumno', $alumno->id)->get();
        $instancias = Instancia::all();

        return view('panel.registro_academico.listado_nota',compact('alumno', 'registros_academico', 'instancias'));
    }
}
