<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Models\Caja;
use App\Models\Factura;
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
    public function store(ValidationRequest $request)
    {
        //Validacion de los datos
        $validated = $request->validated();

        //Guardado de los datos
        Caja::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('facturas.index')->with('status','Apertura registrada con exito!');
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
    public function update(ValidationRequest $request, Caja $caja)
    {
        //Busqueda del caja
        $caja = Caja::findOrFail($caja->id);

        //Validacion de los datos
        $validated = $request->validated();
        $validated['closed_at'] = now();

        //Actualizacion del caja
        $caja->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('facturas.index')->with('status', 'Caja actualizada satisfactoriamente!');
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
    public function close(Caja $caja)
    {
        $monto_cierre = 0;
        $caja = Caja::findOrFail($caja->id);
        $facturas = Factura::where('created_at', now()->format('Y-m-d'))->get();
        foreach ($facturas as $factura) {
            $monto_cierre += $factura->total;
        }
        $caja['monto_cierre'] = $monto_cierre;
        return view('panel.cajas.close', ['caja'=>$caja]);
    }
}
