<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\ValidationRequest;
use App\Models\Alumno;
use App\Models\Curso;
use Illuminate\Http\Request;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alumnos = Alumno::all();

        return view('panel.alumnos.index', compact('alumnos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cursos = Curso::all();
        return view('panel.alumnos.create', compact('cursos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AlumnoRequest $request)
    {
        //Validacion de los datos
        $validated = $request->validated();

        //Guardado de los datos
        Alumno::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('alumnos.index')->with('status','Alumno creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        $alumno = Alumno::findOrFail($alumno->id);
        return view('panel.alumnos.show', ['alumno'=>$alumno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        $alumno = Alumno::findOrFail($alumno->id);
        return view('panel.alumnos.edit', ['alumno'=>$alumno]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AlumnoRequest $request, Alumno $alumno)
    {
        //Busqueda del alumno
        $alumno = Alumno::findOrFail($alumno->id);

        //Validacion de los datos
        $validated = $request->validated();

        //Actualizacion del alumno
        $alumno->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('alumnos.index')->with('status', 'Alumno actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //Busqueda del alumno
        $alumno = Alumno::findOrFail($alumno->id);

        //Eliminacion del alumno
        $alumno->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('alumnos.index')->with('status', 'Alumno eliminado satifactoriamente!');
    }

    public function graficosAlumnos() {
        // Si se hace una peticion AJAX
        if(request()->ajax()) {
        $labels = [];
        $counts = [];
        $alumnos = Alumno::get();
        foreach($alumnos as $alumno) {
        $labels[] = $alumno->id_curso;
        $counts[] = Alumno::where('id_curso', $alumno->id)->count();
        }
        $response = [
        'success' => true,
        'data' => [$labels, $counts]
        ];
        return json_encode($response);
        }
        return view('panel.alumnos.charts');}
}
