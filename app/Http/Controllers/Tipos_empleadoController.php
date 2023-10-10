<?php

namespace App\Http\Controllers;

use App\Models\Tipos_empleados;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class Tipos_empleadoController extends Controller
{
    public function index() {
        return view('tipos_empleado.index', [
            'tipos_empleado' => DB::table('tipos_empleado')->paginate(10)
        ]);
    }
    public function create()
    {
        return view('tipos_empleado.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Tipos_empleados::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('tipos_empleado.index')->with('status','Tipo de empleado creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $tipo_empleado = Tipos_empleados::findOrFail($id);
        return view('tipos_empleado.edit', ['tipo_empleado'=>$tipo_empleado]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del empleado
        $tipo_empleado = Tipos_empleados::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del empleado
        $tipo_empleado->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('tipos_empleado.index')->with('status', 'Tipo de empleado actualizado satisfactoriamente!');
     }
    // Destroy
    public function destroy($id) {
        //Busqueda del empleado
        $tipo_empleado = Tipos_empleados::findOrFail($id);

        //Eliminacion del empleado
        $tipo_empleado->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('tipos_empleado.index')->with('status', 'Tipo de empleado eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $tipo_empleado = Tipos_empleados::findOrFail($id);
        return view('tipos_empleado.show', ['tipo_empleado'=>$tipo_empleado]);
    }
}
