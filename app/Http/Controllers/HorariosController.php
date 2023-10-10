<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class HorariosController extends Controller
{
    public function index() {
        return view('horarios.index', [
            'horarios' => DB::table('horarios')->paginate(10)
        ]);
    }
    public function create()
    {
        return view('horarios.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Horarios::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status','Horario creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $horario = Horarios::findOrFail($id);
        return view('horarios.edit', ['horario'=>$horario]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del horario
        $horario = Horarios::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del horario
        $horario->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status', 'Horario actualizado satisfactoriamente!');
     }
    // Destroy
    public function destroy($id) {
        //Busqueda del horario
        $horario = Horarios::findOrFail($id);

        //Eliminacion del horario
        $horario->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status', 'Horario eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $horario = Horarios::findOrFail($id);
        return view('horarios.show', ['horario'=>$horario]);
    }
}
