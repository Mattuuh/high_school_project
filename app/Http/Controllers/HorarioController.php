<?php

namespace App\Http\Controllers;

use App\Models\Curso;
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
      
        return view('panel.horarios.index',compact('horarios'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
       Horario::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.horarios.index')->with('status','Horario creado satisfactoriamente!');
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
        return redirect()->route('panel.horarios.index')->with('status', 'horario actualizado satisfactoriamente!');
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
        return redirect()->route('panel.horarios.index')->with('status', 'horario eliminado satifactoriamente!');
    }
}
