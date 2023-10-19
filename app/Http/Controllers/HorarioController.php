<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('horarios.index', [
            'horarios' => DB::table('horarios')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('horarios.create');
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
        Horario::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status','Horario creado satisfactoriamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Horario $horario)
    {
        $horario = Horario::findOrFail($horario);
        return view('horarios.show', ['horario'=>$horario]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        $horario = Horario::findOrFail($horario);
        return view('horarios.edit', ['horario'=>$horario]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //Busqueda del horario
        $horario = Horario::findOrFail($horario);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del horario
        $horario->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status', 'Horario actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //Busqueda del horario
        $horario = Horario::findOrFail($horario);

        //Eliminacion del horario
        $horario->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('horarios.index')->with('status', 'Horario eliminado satifactoriamente!');
    }
}
