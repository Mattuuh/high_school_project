<?php

namespace App\Http\Controllers;

use App\Models\Periodos_lectivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PeriodosLectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $periodos_lectivo = Periodos_lectivo::all();

        return view('panel.periodos_lectivo.index', compact('periodos_lectivo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.periodos_lectivo.create');
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
        Periodos_lectivo::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('periodos_lectivo.index')->with('status','Periodo_lectivo creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Periodos_lectivo $periodos_lectivo)
    {
        $periodo_lectivo = Periodos_lectivo::findOrFail($periodos_lectivo);
        return view('panel.periodos_lectivo.show', ['periodo_lectivo'=>$periodo_lectivo]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periodos_lectivo $periodos_lectivo)
    {
        $periodo_lectivo = Periodos_lectivo::findOrFail($periodos_lectivo);
        return view('panel.periodos_lectivo.edit', ['periodo_lectivo'=>$periodo_lectivo]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Periodos_lectivo $periodos_lectivo)
    {
        //Busqueda del periodo_lectivo
        $periodo_lectivo = Periodos_lectivo::findOrFail($periodos_lectivo);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del periodo_lectivo
        $periodo_lectivo->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('periodos_lectivo.index')->with('status', 'Periodo_lectivo actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periodos_lectivo $periodos_lectivo)
    {
        //Busqueda del periodo_lectivo
        $periodo_lectivo = Periodos_lectivo::findOrFail($periodos_lectivo);

        //Eliminacion del periodo_lectivo
        $periodo_lectivo->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('periodos_lectivo.index')->with('status', 'Periodo_lectivo eliminado satifactoriamente!');
    }
}
