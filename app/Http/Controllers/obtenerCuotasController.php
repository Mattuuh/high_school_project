<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Cuota;
use App\Models\Factura;
use Illuminate\Http\Request;

class obtenerCuotasController extends Controller
{
    public function index(Request $request) {
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
}
