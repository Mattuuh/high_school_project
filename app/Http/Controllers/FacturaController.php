<?php

namespace App\Http\Controllers;

use App\Http\Requests\AlumnoRequest;
use App\Http\Requests\FacturaRequest;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Alumno;
use App\Models\Caja;
use App\Models\Cuota;
use App\Models\Detalles_factura;
use App\Models\Factura;
use App\Models\Formas_pago;
use DateTime;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::whereDate('created_at', now()->format('Y-m-d'))->get();
        $caja = Caja::whereDate('created_at', now()->format('Y-m-d'))->first();
        $caja['closed_at'] = new DateTime($caja->closed_at);

        return view('panel.facturas.index', compact('facturas', 'caja'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cuotas = Cuota::all(); // Traer solo cuotas impagas
        $forma_pagos = Formas_pago::all();
        $caja = Caja::whereDate('created_at', now()->format('Y-m-d'))->first();
        return view('panel.facturas.create', compact('cuotas', 'forma_pagos', 'caja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FacturaRequest $request)
    {
        //Validacion de los datos
        $validated = $request->all();
        $alumno = Alumno::where('dni', $validated['legajo_alu'])->first();
        $validated['legajo_alu'] = $alumno->id;
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
    public function update(FacturaRequest $request, Factura $factura)
    {
        //Busqueda del factura
        $factura = Factura::findOrFail($factura->id);

        //Validacion de los datos
        $validated = $request->validated();

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

    public function obtenerCuotas(Request $request) {
        // Obtén las cuotas relevantes según el legajo_alu
        $legajo_alu = $request->input('legajo_alu');
        $alumno = Alumno::where('dni', $legajo_alu)->first();
        $facturas = Factura::where('legajo_alu', $alumno->id)->get();

        if ($facturas->count() > 0) {
            $idCuotas = $facturas->pluck('id_cuota')->toArray();

                // Obtener las cuotas excluyendo los id_cuota de las facturas
                $cuotas = Cuota::whereIn('id', $idCuotas)->get();
        } else {
            $cuotas = Cuota::all();
        }

        return response()->json($cuotas);
    }

    public function facturaPDF(Factura $factura) {
        
        $factura = Factura::findOrFail($factura->id);
        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.facturas.pdf_factura', compact('factura'));
        // renderizamos la vista
        $pdf->render();
        // visualizaremos el pdf en el navegador
        return $pdf->stream('facturas.pdf');
    }

    /* public function createalumno() {
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
    } */
}
