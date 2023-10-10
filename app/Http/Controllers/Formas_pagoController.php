<?php

namespace App\Http\Controllers;

use App\Models\Formas_pagos;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

class Formas_pagoController extends Controller
{
    public function index() {
        return view('formas_pago.index', [
            'formas_pago' => DB::table('formas_pago')->paginate(10)
        ]);
    }
    public function create()
    {
        return view('formas_pago.create');
    }
    
    // Store
    public function store(Request $request)
    {
        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Guardado de los datos
        Formas_pagos::create($validated);

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('formas_pago.index')->with('status','forma_pago creado satisfactoriamente!');
    }
    
    // Edit
    public function edit($id)
     {
        $forma_pago = Formas_pagos::findOrFail($id);
        return view('formas_pago.edit', ['forma_pago'=>$forma_pago]);
     }
    
    // Update
     public function update(Request $request,$id)
     {
        //Busqueda del forma_pago
        $forma_pago = Formas_pagos::findOrFail($id);

        //Validacion de los datos
        $validated = $request->validate([
            'name' => 'required|string|max:20',
        ]);

        //Actualizacion del forma_pago
        $forma_pago->update($request->all());

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('formas_pago.index')->with('status', 'forma_pago actualizado satisfactoriamente!');
     }
    // Destroy
    public function destroy($id) {
        //Busqueda del forma_pago
        $forma_pago = Formas_pagos::findOrFail($id);

        //Eliminacion del forma_pago
        $forma_pago->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('formas_pago.index')->with('status', 'forma_pagoo eliminado satifactoriamente!');
    }
    
    // Show
    public function show($id) {
        $forma_pago = Formas_pagos::findOrFail($id);
        return view('formas_pago.show', ['forma_pago'=>$forma_pago]);
    }
}
