<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $empleados = Empleado::all();

        return view("panel.empleados.index", compact("empleados"));
        /* return view('empleados.index', [
            'empleados' => DB::table('empleados')->simplePaginate(10)
        ]); */
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('panel.empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Empleado::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('empleados.index')->with('status','Empleado creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Empleado $empleado)
    {
        $empleado = Empleado::findOrFail($empleado);
        return view('empleados.show', ['empleado'=>$empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        $empleado = Empleado::findOrFail($empleado->legajo_emp);
        return view('empleados.edit', ['empleado'=>$empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Empleado $empleado)
    {
        //Busqueda del empleado
        $empleado = Empleado::findOrFail($empleado);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del empleado
        $empleado->update($validated);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.empleados.index')->with('status', 'Empleado actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //Busqueda del empleado
        $empleado = Empleado::findOrFail($empleado);

        //Eliminacion del empleado
        $empleado->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.empleados.index')->with('status', 'Empleado eliminado satifactoriamente!');
    }
}
