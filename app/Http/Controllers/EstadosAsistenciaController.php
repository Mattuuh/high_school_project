<?php

namespace App\Http\Controllers;

use App\Models\Estados_asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadosAsistenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('estados_asistencia.index', [
            'estados_asistencia' => DB::table('estados_asistencias')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('estados_asistencia.create');
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
        Estados_asistencia::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('estados_asistencia.index')->with('status','Estado de asistencia creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Estados_asistencia $estados_asistencia)
    {
        $estados_asistencia = Estados_asistencia::findOrFail($estados_asistencia);
        return view('estados_asistencia.show', ['estados_asistencia'=>$estados_asistencia]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Estados_asistencia $estados_asistencia)
    {
        $estados_asistencia = Estados_asistencia::findOrFail($estados_asistencia);
        return view('estados_asistencia.edit', ['estados_asistencia'=>$estados_asistencia]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Estados_asistencia $estados_asistencia)
    {
        //Busqueda del estados_asistencia
        $estados_asistencia = Estados_asistencia::findOrFail($estados_asistencia);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del estados_asistencia
        $estados_asistencia->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('estados_asistencia.index')->with('status', 'Estado de asistencia actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Estados_asistencia $estados_asistencia)
    {
        //Busqueda del estados_asistencia
        $estados_asistencia = Estados_asistencia::findOrFail($estados_asistencia);

        //Eliminacion del estados_asistencia
        $estados_asistencia->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('estados_asistencia.index')->with('status', 'Estado de asistencia eliminado satifactoriamente!');
    }
}
