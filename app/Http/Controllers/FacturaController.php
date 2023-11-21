<?php

namespace App\Http\Controllers;

use App\Models\Cuota;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::all();

        return view('panel.facturas.index', compact('facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuotas = Cuota::all();
        return view('panel.facturas.create', compact('cuotas'));
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
}
