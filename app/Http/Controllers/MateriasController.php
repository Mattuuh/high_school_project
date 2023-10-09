<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class MateriasController extends Controller
{
    public function index() {
        return view('materias.index', [
            'materias' => DB::table('materias')->paginate(10)
        ]);
    }
    public function create()
    {
        return view('materias.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Materias::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('materias.index')->with('status','Materia creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $materia = Materias::findOrFail($id);
        return view('materias.edit', ['materia'=>$materia]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del materia
        $materia = Materias::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del materia
        $materia->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('materias.index')->with('status', 'Materia actualizado satisfactoriamente!');
     }
    // Destroy
    public function destroy($id) {
        //Busqueda del materia
        $materia = Materias::findOrFail($id);

        //Eliminacion del materia
        $materia->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('materias.index')->with('status', 'Materia eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $materia = Materias::findOrFail($id);
        return view('materias.show', ['materia'=>$materia]);
    }
}
