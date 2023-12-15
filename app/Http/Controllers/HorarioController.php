<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docentes_materia;
use App\Models\Empleado;
use App\Models\Hora;
use App\Models\Horario;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$horarios=Horario::with(['empleados','materias','cursos','horas'])->get();
        $horarios = Horario::orderBy('hora_clase', 'asc')->get();
        //$horarios = null;
        $cursos = Curso::all();
        $dataHora = Hora::all();

        $horariosAgrupados = [];

        // Agrupa los horarios por hora y día
        foreach ($horarios as $horario) {
            $hora = $horario['hora_clase'];
            $dia = $horario['id_dia'];

            // Crea una entrada para la hora si aún no existe
            if (!isset($horariosAgrupados[$hora])) {
                $horariosAgrupados[$hora] = [];
            }

            // Añade la información del horario para el día correspondiente
            $horariosAgrupados[$hora][$dia] = [
                'docente' => $horario->empleados->nombre.' '.$horario->empleados->apellido,
                'materia' => $horario->materias->nom_materia,
                'curso' => $horario->cursos->nombre . ' "' . $horario->cursos->division. '"',
            ];
        }
        //dd($horariosAgrupados);
      
        return view('panel.horarios.index',compact('horarios','horariosAgrupados', 'cursos', 'dataHora'));
    }
   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $horas = Hora::all();
        $horarios_id = Horario::select('curso')->get();
        $cursos = Curso::whereNotIn('id', $horarios_id)->get();
        $materias = Materia::all();
        return view('panel.horarios.create', compact('horas', 'cursos', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los datos
        $data = $request->all();

        $id_curso = $data['id_curso'];
        $id_materia = $data['materias'];
        $id_docente = $data['docentes'];

        $modulos = [];
        for ($i=1; $i <= 11; $i++) {
            for ($e=1; $e <= 5; $e++) {
                if (intval($id_materia[$i][$e]) != 0) {
                    Horario::create([
                        'docente' => $id_docente[$i][$e],
                        'materia' => $id_materia[$i][$e],
                        'hora_clase' => $i,
                        'curso' => $id_curso,
                        'id_dia' => $e,
                    ]);
                }
                
            }
            
        }/* 
        //dd($id_materia);
        dd($modulos);
        dd($data);
        //Guardado de los datos
       Horario::create($validated); */

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status','Horario creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        $horario = Horario::findOrFail($horario);
        return view('panel.horarios.show', ['horario'=>$horario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $horario = Horario::findOrFail($horario->id);
        return view('panel.horarios.edit', ['horario'=>$horario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //Busqueda del alumno
        $horario = Horario::findOrFail($horario);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del alumno
        $horario->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status', 'horario actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //Busqueda del alumno
        $horario = Horario::findOrFail($horario);

        //Eliminacion del alumno
        $horario->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status', 'horario eliminado satifactoriamente!');
    }
    public function buscar(Request $request) {
        //dd($request);
        $horarios = Horario::where('curso', $request->filtro)->get();
        return compact('horarios');
    }
    public function obtenerDocentes(Request $request)
    {
        $id_materia = $request->input('id');

        $docentes = Docentes_materia::where('id_materia', $id_materia)->select('id_docente')->get();

        $results = [];
        foreach ($docentes as $docente) {
            $results[] = [
                'id' => $docente->docentes->legajo_emp,
                'nombre' => $docente->docentes->nombre,
                'apellido' => $docente->docentes->apellido,
                'data-element-data' => json_encode([
                    'nombre' => $docente->docentes->nombre,
                    'apellido' => $docente->docentes->apellido,
                    // Otros datos que desees incluir
                ])
            ];
        }

        return response()->json($results);
    }
}
