<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuotaRequest;
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
    public function store(CuotaRequest $request)
    {
        //Validacion de los datos
        $validated = $request->validated();

        //Guardado de los datos
        Cuota::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('cuotas.index')->with('status','Cuota creada satisfactoriamente!');
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
        $cuota = Cuota::findOrFail($cuota->id);
        return view('panel.cuotas.edit', ['cuota'=>$cuota]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CuotaRequest $request, Cuota $cuota)
    {
        //Busqueda del cuota
        $cuota = Cuota::findOrFail($cuota->id);

        //Validacion de los datos
        $validated = $request->validated();

        //Actualizacion del cuota
        $cuota->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('cuotas.index')->with('status', 'Cuota actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuota $cuota)
    {
        //Busqueda del cuota
        $cuota = Cuota::findOrFail($cuota->id);

        //Eliminacion del cuota
        $cuota->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('cuotas.index')->with('status', 'Cuota eliminado satifactoriamente!');
    }
}
