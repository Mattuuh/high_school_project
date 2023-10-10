<?php

namespace App\Http\Controllers;

use App\Models\Periodos_lectivo;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class Periodos_lectivoController extends Controller
{
    public function index() {
        return view('periodos_lectivo.index', [
            'periodos_lectivo' => DB::table('periodos_lectivo')->paginate(10)
        ]);
    }
    public function create()
    {
        return view('periodos_lectivo.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Periodos_lectivo::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('periodos_lectivo.index')->with('status','Periodo_lectivo creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $periodo_lectivo = Periodos_lectivo::findOrFail($id);
        return view('periodos_lectivo.edit', ['periodo_lectivo'=>$periodo_lectivo]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del periodo_lectivo
        $periodo_lectivo = Periodos_lectivo::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del periodo_lectivo
        $periodo_lectivo->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('periodos_lectivo.index')->with('status', 'Periodo_lectivo actualizado satisfactoriamente!');
     }
    // Destroy
    public function destroy($id) {
        //Busqueda del periodo_lectivo
        $periodo_lectivo = Periodos_lectivo::findOrFail($id);

        //Eliminacion del periodo_lectivo
        $periodo_lectivo->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('periodos_lectivo.index')->with('status', 'Periodo_lectivo eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $periodo_lectivo = Periodos_lectivo::findOrFail($id);
        return view('periodos_lectivo.show', ['periodo_lectivo'=>$periodo_lectivo]);
    }
}
