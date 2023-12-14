<?php

namespace App\Http\Controllers;

use App\Http\Requests\FacturaRequest;
use App\Models\Alumno;
use App\Models\Caja;
use App\Models\Cuota;
use App\Models\Factura;
use App\Models\Formas_pago;
use Illuminate\Http\Request;

class FacturaBaseController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        
        return view('panel.facturasbase.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuotas = Cuota::all(); // Traer solo cuotas impagas
        $forma_pagos = Formas_pago::all();
        $caja = Caja::whereDate('created_at', now()->format('Y-m-d'))->first();
        return view('panel.facturasbase.create', compact('cuotas', 'forma_pagos', 'caja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacturaRequest $request)
    {
        //Validacion de los datos
        $validated = $request->all();
        $alumno = Alumno::where('dni', $validated['id_alumno'])->first();
        $validated['id_alumno'] = $alumno->id;
        $cuota = Cuota::where('id', $validated['id_cuota'])->first();
        $validated['id_cuota'] = $cuota->id;
        $validated['total'] = $cuota->monto;
        //var_dump($validated);die;
        if ($validated['id_cuota'] == 1) {
            $alumno->update(['habilitado' => true]);
        }

        //Guardado de los datos
        Factura::create($validated);
        /* $factura = Factura::latest()->first();

        $detalleF = [];
        $detalleF['n_factura'] = $factura->id;
        $cuota = Cuota::where('id', $validated['id_cuota'])->first();
        $detalleF['id_cuota'] = $cuota->id;
        $detalleF['subtotal'] = $cuota->monto;
        //var_dump($detalleF);die;

        //Detalles_factura::create($detalleF);
        try {
            Detalles_factura::create($detalleF);
        } catch (\Exception $e) {
            dd($e->getMessage());
        } */

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('facturasbase.index')->with('status','Factura creada satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Factura $factura)
    {
        $factura = Factura::findOrFail($factura);
        return view('panel.facturasbase.show', ['factura'=>$factura]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Factura $factura)
    {
        $factura = Factura::findOrFail($factura->id);
        return view('panel.facturasbase.edit', ['factura'=>$factura]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FacturaRequest $request, Factura $factura)
    {
        //Busqueda del factura
        $factura = Factura::findOrFail($factura->id);

        //Validacion de los datos
        $validated = $request->validated();

        //Actualizacion del factura
        $factura->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('facturasbase.index')->with('status', 'Factura actualizado satisfactoriamente!');
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
        return redirect()->route('facturasbase.index')->with('status', 'Factura eliminado satifactoriamente!');
    }
}
