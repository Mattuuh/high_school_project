<?php

namespace App\Http\Controllers;

use App\Models\Tipos_empleado;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class TiposEmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tipos_empleado.index', [
            'tipos_empleado' => DB::table('tipos_empleados')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tipos_empleado.create');
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
        Tipos_empleado::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('tipos_empleado.index')->with('status','Tipo de empleado creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tipos_empleado $tipos_empleado)
    {
        $tipo_empleado = Tipos_empleado::findOrFail($tipos_empleado);
        return view('tipos_empleado.show', ['tipo_empleado'=>$tipo_empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tipos_empleado $tipos_empleado)
    {
        $tipo_empleado = Tipos_empleado::findOrFail($tipos_empleado);
        return view('tipos_empleado.edit', ['tipo_empleado'=>$tipo_empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tipos_empleado $tipos_empleado)
    {
        //Busqueda del empleado
        $tipo_empleado = Tipos_empleado::findOrFail($tipos_empleado);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del empleado
        $tipo_empleado->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('tipos_empleado.index')->with('status', 'Tipo de empleado actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tipos_empleado $tipos_empleado)
    {
        //Busqueda del empleado
        $tipo_empleado = Tipos_empleado::findOrFail($tipos_empleado);

        //Eliminacion del empleado
        $tipo_empleado->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('tipos_empleado.index')->with('status', 'Tipo de empleado eliminado satifactoriamente!');
    }
}
