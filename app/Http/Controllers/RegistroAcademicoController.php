<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\RegistroAcademico;
use Illuminate\Http\Request;

class RegistroAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registros = RegistroAcademico::with('alumno','instancia','asignaturas')->get();
        //dd($registro);
        return view('panel.registro_academico.index',compact('registros'));
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
        $validated = $request->validate([]);

        RegistroAcademico::create($validated);

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

        $validated = $request->validate([]);

        $registroAcademico->update($validated);

        return redirect()->route('registro_academico.index')->with('status','Registro actualizado satisfactoriamente!');
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
}
