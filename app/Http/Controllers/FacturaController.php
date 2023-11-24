<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\FacturaRequest;
use App\Models\Alumno;
use App\Models\Caja;
use App\Models\Cuota;
use App\Models\Factura;
use App\Models\Formas_pago;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::whereDate('created_at', now()->format('Y-m-d'));
        $caja = Caja::whereDate('created_at', now()->format('Y-m-d'))->first();

        return view('panel.facturas.index', compact('facturas', 'caja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuotas = Cuota::all();
        $forma_pagos = Formas_pago::all();
        $caja = Caja::whereDate('created_at', now()->format('Y-m-d'))->first();
        return view('panel.facturas.create', compact('cuotas', 'forma_pagos', 'caja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacturaRequest $request)
    {
        //var_dump($request->all());die;
        //Validacion de los datos
        $validated = $request->all();
        $monto = Cuota::where('id', $validated['cuota'])->first();
        $validated['total'] = $monto['monto'];
        $legajo_alu = Alumno::where('dni', $validated['dni'])->first();
        $validated['legajo_alu'] = $legajo_alu['id'];
        $validated['id_cuota'] = $validated['cuota'];
        //var_dump($validated);die;

        //Guardado de los datos
        Factura::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('facturas.index')->with('status','Factura creada satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        $factura = Factura::findOrFail($factura);
        return view('panel.facturas.show', ['factura'=>$factura]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        $factura = Factura::findOrFail($factura->id);
        return view('panel.facturas.edit', ['factura'=>$factura]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Factura $factura)
    {
        //Busqueda del factura
        $factura = Factura::findOrFail($factura);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del factura
        $factura->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('facturas.index')->with('status', 'Factura actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factura $factura)
    {
        //Busqueda del factura
        $factura = Factura::findOrFail($factura->id);

        //Eliminacion del factura
        $factura->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('facturas.index')->with('status', 'Factura eliminado satifactoriamente!');
    }

    public function createalumno() {
        return view('panel.facturas.createalumno');
    }

    public function storealumno(AlumnoRequest $request)
    {
        //Validacion de los datos
        $validated = $request->validated();

        //Guardado de los datos
        Alumno::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('facturas.create')->with('status','Alumno creado satisfactoriamente!');
    }
}
