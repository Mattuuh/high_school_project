<?php

namespace App\Http\Controllers;

use App\Models\Detalles_factura;
use Illuminate\Http\Request;

class DetallesFacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detalles_facturas = Detalles_factura::all();

        return view('panel.detalles_facturas.index', compact('detalles_facturas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.detalles_facturas.create');
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
        Detalles_factura::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('detalles_facturas.index')->with('status','Detalles creada satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Detalles_factura $detalles_factura)
    {
        $detalles_factura = Detalles_factura::findOrFail($detalles_factura);
        return view('panel.detalles_facturas.show', ['detalles_factura'=>$detalles_factura]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Detalles_factura $detalles_factura)
    {
        $detalles_factura = Detalles_factura::findOrFail($detalles_factura->id);
        return view('panel.detalles_facturas.edit', ['detalles_factura'=>$detalles_factura]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Detalles_factura $detalles_factura)
    {
        //Busqueda del detalles_factura
        $detalles_factura = Detalles_factura::findOrFail($detalles_factura);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del detalles_factura
        $detalles_factura->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('detalles_facturas.index')->with('status', 'Detalles actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Detalles_factura $detalles_factura)
    {
        //Busqueda del detalles_factura
        $detalles_factura = Detalles_factura::findOrFail($detalles_factura->id);

        //Eliminacion del detalles_factura
        $detalles_factura->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('detalles_facturas.index')->with('status', 'Detalle eliminado satifactoriamente!');
    }
}
