<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursoRequest;
use App\Models\Alumno;
use App\Models\Curso;
use App\Models\Periodos_lectivo;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Curso::all();

        return view('panel.cursos.index', compact('cursos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $periodos_lectivo = Periodos_lectivo::all();
        return view('panel.cursos.create', compact('periodos_lectivo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CursoRequest $request)
    {
        //Validacion de los datos
        $validated = $request->validated();

        //Guardado de los datos
        Curso::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('cursos.index')->with('status','Curso creada satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Curso $curso)
    {
        $curso = Curso::findOrFail($curso);
        return view('panel.cursos.show', ['curso'=>$curso]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Curso $curso)
    {
        $curso = Curso::findOrFail($curso->id);
        return view('panel.cursos.edit', ['curso'=>$curso]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CursoRequest $request, Curso $curso)
    {
        //Busqueda del curso
        $curso = Curso::findOrFail($curso->id);

        //Validacion de los datos
        $validated = $request->validated();

        //Actualizacion del curso
        $curso->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('cursos.index')->with('status', 'Curso actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Curso $curso)
    {
        //Busqueda del curso
        $curso = Curso::findOrFail($curso->id);

        //Eliminacion del curso
        $curso->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('cursos.index')->with('status', 'Curso eliminado satifactoriamente!');
    }

    
       
}
