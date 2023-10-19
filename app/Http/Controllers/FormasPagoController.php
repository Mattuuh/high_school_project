<?php

namespace App\Http\Controllers;

use App\Models\Formas_pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormasPagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('formas_pago.index', [
            'formas_pago' => DB::table('formas_pago')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('formas_pago.create');
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
        Formas_pago::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('formas_pago.index')->with('status','forma_pago creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Formas_pago $formas_pago)
    {
        $forma_pago = Formas_pago::findOrFail($formas_pago);
        return view('formas_pago.show', ['forma_pago'=>$forma_pago]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formas_pago $formas_pago)
    {
        $forma_pago = Formas_pago::findOrFail($formas_pago);
        return view('formas_pago.edit', ['forma_pago'=>$forma_pago]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formas_pago $formas_pago)
    {
        //Busqueda del forma_pago
        $forma_pago = Formas_pago::findOrFail($formas_pago);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del forma_pago
        $forma_pago->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('formas_pago.index')->with('status', 'forma_pago actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formas_pago $formas_pago)
    {
        //Busqueda del forma_pago
        $forma_pago = Formas_pago::findOrFail($formas_pago);

        //Eliminacion del forma_pago
        $forma_pago->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('formas_pago.index')->with('status', 'forma_pagoo eliminado satifactoriamente!');
    }
}
