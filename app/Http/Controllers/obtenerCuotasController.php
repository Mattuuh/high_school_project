<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Cuota;
use App\Models\Factura;
use Carbon\Carbon;
use Illuminate\Http\Request;

class obtenerCuotasController extends Controller
{
    public function index(Request $request) {
        // Obtén las cuotas relevantes según el legajo_alu
        $id_alumno = $request->input('id_alumno');
        $alumno = Alumno::where('dni', $id_alumno)->first();
        $facturas = Factura::where('id_alumno', $alumno->id)->get();

        if ($facturas->count() > 0) {
            $idCuotas = $facturas->pluck('id_cuota')->toArray();
            $cuotas = Cuota::whereNotIn('id', $idCuotas)->get();
        } else {
            $cuotas = Cuota::all();
        }

        return response()->json($cuotas);
    }
}
