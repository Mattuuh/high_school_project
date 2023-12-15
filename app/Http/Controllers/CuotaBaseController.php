<?php

namespace App\Http\Controllers;

use App\Http\Requests\CuotaRequest;
use App\Models\Alumno;
use App\Models\Cuota;
use App\Models\Detalles_factura;
use App\Models\Factura;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CuotaBaseController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuotas = Cuota::all();
        return view('panel.cuotas_base.index', compact('cuotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.cuotas_base.create');
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
        return redirect()->route('cuotasbase.index')->with('status','Cuota creada satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuota $cuota)
    {
        $cuota = Cuota::findOrFail($cuota->id);
        return view('panel.cuotas_base.modals', compact('cuota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuota $cuotas_base)
    {
        //dd($cuotas_base->id);
        $cuota = Cuota::findOrFail($cuotas_base->id);
        return view('panel.cuotas_base.edit', ['cuota'=>$cuota]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CuotaRequest $request, Cuota $cuotas_base)
    {
        //Busqueda del cuota
        $cuota = Cuota::findOrFail($cuotas_base->id);

        //Validacion de los datos
        $validated = $request->validated();

        //Actualizacion del cuota
        $cuota->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('cuotasbase.index')->with('status', 'Cuota actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuota $cuotas_base)
    {
        //Busqueda del cuota
        $cuota = Cuota::findOrFail($cuotas_base->id);

        //Eliminacion del cuota
        $cuota->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('cuotasbase.index')->with('status', 'Cuota eliminado satifactoriamente!');
    }
}

