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

class CuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuotas = Cuota::all(); // WHERE id_factura = factura.id
        $alumnos = Alumno::select('id','nombre','apellido','dni','habilitado')->get(); //WHERE id = factura.legajo_alu AND
        //$alumnos = Alumno::all();
        return view('panel.cuotas.index', compact('cuotas', 'alumnos'));
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
        $cuota = Cuota::findOrFail($cuota->id);
        return view('panel.cuotas.modals', compact('cuota'));
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
    public function filtroalumno(Alumno $alumno) {
        $alumno = Alumno::findOrFail($alumno->id);
        /* $facturas = Factura::where('legajo_alu', $alumno->id)->get();
        foreach ($facturas as $factura) {
            $detalleF[] = Detalles_factura::where('id_factura', $factura->id)->get(); // WHERE id_factura == factura.id
        }
        
        foreach ($detalleF as $detalle) {
            $cuotasPag[] = Cuota::find('id', $detalle->id_cuota);
            $cuotasImpag[] = Cuota::where('id', '!=', $detalle->id_cuota)->get();
        } */
        /* $facturas = Factura::where('legajo_alu', $alumno->id)->get();

        if ($facturas->count() > 0) {
            foreach ($facturas as $factura) {
                // Utiliza find para obtener una cuota por su ID
                $cuotasPag = Cuota::where('id',$factura->id_cuota)->get();
    
                // Utiliza where para obtener cuotas diferentes a la ID especificada
                $cuotasImpag = Cuota::where('id', '!=', $factura->id_cuota)->get();
                $cuotasImpag = $cuotasImpag->count() > 0 ? $cuotasImpag : null;
            }
        } else {
            $cuotasPag = null;
            $cuotasImpag = Cuota::all();
        } */
        /* var_dump($cuotasPag);die;
        var_dump($cuotasImpag);die; */

        return view('panel.cuotas.filtroalumno', compact('alumno', 'cuotasPag', 'cuotasImpag'));
    }
    public function cuotasPagPDF(Alumno $alumno) {
        $alumno = Alumno::findOrFail($alumno->id);
        $facturas = Factura::where('legajo_alu', $alumno->id)->get();
        
        if ($facturas->count() > 0) {
            $idCuotas = $facturas->pluck('id_cuota')->toArray();

            // Obtener las cuotas excluyendo los id_cuota de las facturas
            $cuotas = Cuota::whereIn('id', $idCuotas)->get();
        } else {
            $cuotas = null;
        }
        $pdf = Pdf::loadView('panel.cuotas.pdf_cuotas_pag', compact('cuotas', 'alumno'));
        // renderizamos la vista
        $pdf->render();
        // visualizaremos el pdf en el navegador
        return $pdf->stream('cuotas.pdf');
    }
    public function cuotasImpPDF(Alumno $alumno) {
        $alumno = Alumno::findOrFail($alumno->id);
        $facturas = Factura::where('legajo_alu', $alumno->id)->get();
        
        if ($facturas->count() > 0) {
            $idCuotas = $facturas->pluck('id_cuota')->toArray();

            // Obtener las cuotas excluyendo los id_cuota de las facturas
            $cuotas = Cuota::whereNotIn('id', $idCuotas)->get();
        } else {
            $cuotas = Cuota::all();
        }
        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.cuotas.pdf_cuotas_imp', compact('cuotas', 'alumno'));
        // renderizamos la vista
        $pdf->render();
        // visualizaremos el pdf en el navegador
        return $pdf->stream('cuotas.pdf');
    }
    /* public function coutasInformesPDF(Request $request) {
        $alumnos = Alumno::all();
        $legajos_alu = $alumnos->pluck('dni')->toArray();

        $operacion = $request['operacion'];

        if ($operacion == 'inscriptos') {
            $facturas_ins = Factura::select('legajo_alu')->whereIn('legajo_alu', $legajos_alu)->where('id_cuota', 1)->get();
            $alumnos_inscriptos = $facturas_ins;
            
            // capturamos la vista y los datos que enviaremos a la misma
            $pdf = Pdf::loadView('panel.cuotas.pdf_inscriptos', compact('alumnos_inscriptos'));
            // renderizamos la vista
            $pdf->render();
            // visualizaremos el pdf en el navegador
            return $pdf->stream('inscriptos.pdf');
        } 
        elseif ($operacion == 'no_inscriptos') {
            $facturas_no_ins = Factura::select('legajo_alu')->whereNotIn('legajo_alu', $legajos_alu)->where('id_cuota', 1)->get();
            $alumnos_no_inscriptos = $facturas_no_ins;
            
            // capturamos la vista y los datos que enviaremos a la misma
            $pdf = Pdf::loadView('panel.cuotas.pdf_no_inscriptos', compact('alumnos_no_inscriptos'));
            // renderizamos la vista
            $pdf->render();
            // visualizaremos el pdf en el navegador
            return $pdf->stream('no_inscriptos.pdf');
        } else {
            $facturas_ins = Factura::select('legajo_alu')->whereIn('legajo_alu', $legajos_alu)->where('id_cuota', 1)->get();
            $alumnos_inscriptos = $facturas_ins;

            $facturas_no_ins = Factura::select('legajo_alu')->whereNotIn('legajo_alu', $legajos_alu)->where('id_cuota', 1)->get();
            $alumnos_no_inscriptos = $facturas_no_ins;

            // capturamos la vista y los datos que enviaremos a la misma
            $pdf = Pdf::loadView('panel.cuotas.pdf_ins_y_no_ins', compact('alumnos_inscriptos', 'alumnos_no_inscriptos'));
            // renderizamos la vista
            $pdf->render();
            // visualizaremos el pdf en el navegador
            return $pdf->stream('ins_y_no_ins.pdf');
        }
    } */
    public function informeIncriptosPDF() {
        $alumnos = Alumno::all();
        $legajos_alu = $alumnos->pluck('id')->toArray();
        $facturas_ins = Factura::select('legajo_alu')->whereIn('legajo_alu', $legajos_alu)->where('id_cuota', 1)->get();
        $alumnos_inscriptos = $facturas_ins->pluck('legajo_alu')->toArray();
        $alumnos = Alumno::whereIn('id',$alumnos_inscriptos)->orderBy('apellido','asc')->get();
        
        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.cuotas.pdf_inscriptos', compact('alumnos'));
        // renderizamos la vista
        $pdf->render();
        // visualizaremos el pdf en el navegador
        return $pdf->stream('inscriptos.pdf');
    }
    public function informeNoInscriptosPDF() {
        $alumnos = Alumno::all();
        $legajos_alu = $alumnos->pluck('id')->toArray();
        $facturas_no_ins = Factura::select('legajo_alu')->whereIn('legajo_alu', $legajos_alu)->get();
        $facturas_no_ins = Alumno::whereNotIn('id',$facturas_no_ins)->orderBy('apellido','asc')->get();
        $alumnos_no_inscriptos = $facturas_no_ins;
        
        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.cuotas.pdf_no_inscriptos', compact('alumnos_no_inscriptos'));
        // renderizamos la vista
        $pdf->render();
        // visualizaremos el pdf en el navegador
        return $pdf->stream('no_inscriptos.pdf');
    }
    public function informeInsNoInsPDF() {
        $alumnos = Alumno::all();
        $legajos_alu = $alumnos->pluck('id')->toArray();
        
        $facturas_ins = Factura::select('legajo_alu')->whereIn('legajo_alu', $legajos_alu)->where('id_cuota', 1)->get();
        $alumnos_inscriptos = $facturas_ins->pluck('legajo_alu')->toArray();
        $alumnos_inscriptos = Alumno::whereIn('id',$alumnos_inscriptos)->orderBy('apellido','asc')->get();

        $facturas_no_ins = Factura::select('legajo_alu')->whereIn('legajo_alu', $legajos_alu)->get();
        $facturas_no_ins = Alumno::whereNotIn('id',$facturas_no_ins)->orderBy('apellido','asc')->get();
        $alumnos_no_inscriptos = $facturas_no_ins;

        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.cuotas.pdf_ins_no_ins', compact('alumnos_inscriptos', 'alumnos_no_inscriptos'));
        // renderizamos la vista
        $pdf->render();
        // visualizaremos el pdf en el navegador
        return $pdf->stream('ins_y_no_ins.pdf');
    }
}
