<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class EmpleadosController extends Controller
{
    public function index() {
        return view('empleados.index', [
            'empleados' => DB::table('empleados')->paginate(10)
        ]);
    }
    // Create
    public function create()
    {
        return view('empleados.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Empleados::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('empleados.index')->with('status','Empleado creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $empleado = Empleados::findOrFail($id);
        return view('empleados.edit', ['empleado'=>$empleado]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del empleado
        $empleado = Empleados::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del empleado
        $empleado->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('empleados.index')->with('status', 'Empleado actualizado satisfactoriamente!');
     }
    // Destroy
    public function destroy($id) {
        //Busqueda del empleado
        $empleado = Empleados::findOrFail($id);

        //Eliminacion del empleado
        $empleado->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('empleados.index')->with('status', 'empleado eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $empleado = Empleados::findOrFail($id);
        return view('empleados.show', ['empleado'=>$empleado]);
    }
}
