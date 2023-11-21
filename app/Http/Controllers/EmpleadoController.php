<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidationRequest;
use App\Models\Empleado;
use App\Models\Tipos_empleado;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\EmpleadoExportExcel;
use Maatwebsite\Excel\Facades\Excel;
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
        $tiposEmp = Tipos_empleado::all();
        return view('panel.empleados.create', compact('tiposEmp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidationRequest $request)
    {
        $validated = $request->validated();

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
        $empleado = Empleado::findOrFail($empleado->legajo_emp);
        return view('panel.empleados.modals', ['empleado'=>$empleado]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Empleado $empleado)
    {
        $empleado = Empleado::findOrFail($empleado->legajo_emp);
        return view('panel.empleados.edit', ['empleado'=>$empleado]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidationRequest $request, Empleado $empleado)
    {
        //Busqueda del empleado
        $empleado = Empleado::findOrFail($empleado->legajo_emp);

        //Actualizacion del empleado
        $empleado->update($request);

        //  Redireccion con un mensaje flash de sesion
        return redirect()->route('panel.empleados.index')->with('status', 'Empleado actualizado satisfactoriamente!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Empleado $empleado)
    {
        //Busqueda del empleado
        $empleado = Empleado::findOrFail($empleado->legajo_emp);

        //Eliminacion del empleado
        $empleado->delete();

        //Redireccion con un mensaje flash de sesion
        return redirect()->route('empleados.index')->with('status', 'Empleado eliminado satifactoriamente!');
    }
    public function exportarEmpleadosPDF() {
        // Traemos los empleados
        $empleados = Empleado::all();
        // capturamos la vista y los datos que enviaremos a la misma
        $pdf = Pdf::loadView('panel.empleados.pdf_empleados', compact('empleados'));
        Pdf::setOption(['dpi' => 90]);
        // renderizamos la vista
        $pdf->render();
        // visualizaremos el pdf en el navegador
        return $pdf->stream('empleados.pdf');
    }
    public function exportarEmpleadosExcel() {
        return Excel::download(new EmpleadoExportExcel, 'empleados.xlsx');
    }
}
