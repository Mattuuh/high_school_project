<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('query');

        // Consulta SQL para buscar coincidencias en la base de datos
        if ($searchTerm != '') {
            $results = DB::table('alumnos')
                ->select('*')
                ->where('dni_alu', 'LIKE', '%' . $searchTerm . '%')
                ->limit(4)
                ->get();
            return response()->json($results);
        }
        // Retornar las opciones como JSON
    }
}
