<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MateriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materias = Materia::all();

        return view('panel.materias.index', compact('materias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.materias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'nom_materia' => 'required|string|max:20',
            'anio_materia' => 'required|string',
        ]);

        //Guardado de los datos
        Materia::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('materias.index')->with('status','Materia creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Materia $materia)
    {
        $materia = Materia::findOrFail($materia->id);
        return view('panel.materias.show', ['materia'=>$materia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Materia $materia)
    {
        $materia = Materia::findOrFail($materia->id);
        return view('panel.materias.edit', ['materia'=>$materia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Materia $materia)
    {
        //Busqueda del materia
        $materia = Materia::findOrFail($materia->id);

        //Validacion de los datos
        $validated = $request->validate([
            'nom_materia' => 'required|string|max:20',
            'anio_materia' => 'required|string',
        ]);

        //Actualizacion del materia
        $materia->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('materias.index')->with('status', 'Materia actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Materia $materia)
    {
        //Busqueda del materia
        $materia = Materia::findOrFail($materia->id);

        //Eliminacion del materia
        $materia->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('materias.index')->with('status', 'Materia eliminado satifactoriamente!');
    }
}
