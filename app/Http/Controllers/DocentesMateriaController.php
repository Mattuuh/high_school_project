<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Docentes_materia;
use App\Models\Empleado;
use App\Models\Materia;
use Illuminate\Http\Request;

class DocentesMateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $docxmat = Docentes_materia::all();
        return view('panel.docentes_materia.index', compact('docxmat'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $docentes = Empleado::where('tipo_emp', 4)->get();
        $materias = Materia::all();
        
        return view('panel.docentes_materia.create', compact('docentes', 'materias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->all();

        Docentes_materia::create($validated);

        return redirect()->route('docentes_materia.index')->with('status', 'Guardado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Docentes_materia $docentes_materia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Docentes_materia $docentes_materia)
    {
        $dxm = Docentes_materia::findOrFail($docentes_materia->id);
        $materias = Materia::all();

        return view('panel.docentes_materia.edit', compact('dxm', 'materias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Docentes_materia $docentes_materia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Docentes_materia $docentes_materia)
    {
        //
    }
}
