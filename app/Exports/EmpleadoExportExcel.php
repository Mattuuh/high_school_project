<?php

namespace App\Exports;

use App\Models\Empleado;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EmpleadoExportExcel implements FromView
{
    public function view(): View
    {
        return view('panel.empleados.excel_empleados', [
            'empleados' => Empleado::all()
        ]);
    }
}
