<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $searchTerm = $request->input('query');

        $results = Alumno::where('dni', 'LIKE', '%' . $searchTerm . '%')
                        ->whereNull('deleted_at')
                        ->limit(4)
                        ->get();

        $formattedResults = [];
        foreach ($results as $result) {
            $formattedResults[] = [
                'id' => $result->dni,
                'text' => $result->dni,
                'data-element-data' => json_encode([
                    'nombre' => $result->nombre,
                    'apellido' => $result->apellido,
                    // Otros datos que desees incluir
                ])
            ];
        }

        return response()->json($formattedResults);
    }
}
