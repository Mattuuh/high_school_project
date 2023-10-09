<?php

namespace App\Http\Controllers;

use App\Models\Estados_asistencia;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class Estados_asistenciaController extends Controller
{
    public function index() {
        return view('estados_asistencia.index', [
            'estados_asistencia' => DB::table('estados_asistencia')->paginate(10)
        ]);
    }
    // Create
    public function create()
    {
        return view('estados_asistencia.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Estados_asistencia::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('estados_asistencia.index')->with('status','estado_asistencia creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $estado_asistencia = Estados_asistencia::findOrFail($id);
        return view('estados_asistencia.edit', ['estado_asistencia'=>$estado_asistencia]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del estado_asistencia
        $estado_asistencia = Estados_asistencia::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del estado_asistencia
        $estado_asistencia->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('estados_asistencia.index')->with('status', 'estado_asistencia actualizado satisfactoriamente!');
     }
    // Destroy
    public function destroy($id) {
        //Busqueda del estado_asistencia
        $estado_asistencia = Estados_asistencia::findOrFail($id);

        //Eliminacion del estado_asistencia
        $estado_asistencia->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('estados_asistencia.index')->with('status', 'estado_asistencia eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $estado_asistencia = Estados_asistencia::findOrFail($id);
        return view('estados_asistencia.show', ['estado_asistencia'=>$estado_asistencia]);
    }
}
