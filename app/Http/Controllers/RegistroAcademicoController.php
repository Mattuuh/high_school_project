<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\RegistroAcademico;
use Illuminate\Http\Request;

class RegistroAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
      $registro=RegistroAcademico::with('alumno','instancia','asignaturas')->get();
      //dd($registro);
       return view('panel.registro_academico.index',compact('registro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(RegistroAcademico $registroAcademico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RegistroAcademico $registroAcademico)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RegistroAcademico $registroAcademico)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RegistroAcademico $registroAcademico)
    {
        //
    }
}
