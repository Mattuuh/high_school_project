<?php

namespace App\Http\Controllers;

use App\Models\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cajas = Caja::all();

        return view('panel.cajas.index', compact('cajas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.cajas.create');
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
        Caja::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('cajas.index')->with('status','Caja creada satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Caja $caja)
    {
        $caja = Caja::findOrFail($caja);
        return view('panel.cajas.show', ['caja'=>$caja]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Caja $caja)
    {
        $caja = Caja::findOrFail($caja->id);
        return view('panel.cajas.edit', ['caja'=>$caja]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Caja $caja)
    {
        //Busqueda del caja
        $caja = Caja::findOrFail($caja);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del caja
        $caja->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('cajas.index')->with('status', 'Caja actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Caja $caja)
    {
        //Busqueda del caja
        $caja = Caja::findOrFail($caja->id);

        //Eliminacion del caja
        $caja->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('cajas.index')->with('status', 'Caja eliminado satifactoriamente!');
    }
}
