<?php

namespace App\Http\Controllers;

use App\Models\Hora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HoraController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('panel.horas.index', [
        'horas'=>DB::table('horas')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.horas.create');
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
        Hora::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.horas.index')->with('status','Hora creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hora $hora)
    {
        $Hora = Hora::findOrFail($hora);
        return view('panel.horas.show', ['hora'=>$hora]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hora $hora)
    {
        $Hora = Hora::findOrFail($hora);
        return view('panel.horas.edit', ['hora'=>$hora]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hora $hora)
    {
        //Busqueda del materia
        $materia = Hora::findOrFail($hora);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del materia
        $materia->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.horas.index')->with('status', 'Hora actualizada satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hora $hora)
    {
        //Busqueda del materia
        $materia = Hora::findOrFail($hora);

        //Eliminacion del materia
        $materia->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.horas.index')->with('status', 'Hora eliminada satifactoriamente!');
    }
}