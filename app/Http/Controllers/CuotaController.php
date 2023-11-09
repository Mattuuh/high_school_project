<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use Illuminate\Http\Request;

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuotas = Cuota::all();

        return view('panel.cuotas.index', compact('cuotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.cuotas.create');
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
        Cuota::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.cuotas.index')->with('status','Cuota creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuota $cuota)
    {
        $cuota = Cuota::findOrFail($cuota);
        return view('panel.cuotas.show', ['cuota'=>$cuota]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuota $cuota)
    {
        $cuota = Cuota::findOrFail($cuota);
        return view('panel.cuotas.edit', ['cuota'=>$cuota]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cuota $cuota)
    {
        //Busqueda del cuota
        $cuota = Cuota::findOrFail($cuota);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del cuota
        $cuota->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.cuotas.index')->with('status', 'Cuota actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuota $cuota)
    {
        //Busqueda del cuota
        $cuota = Cuota::findOrFail($cuota);

        //Eliminacion del cuota
        $cuota->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.cuotas.index')->with('status', 'Cuota eliminado satifactoriamente!');
    }
}
