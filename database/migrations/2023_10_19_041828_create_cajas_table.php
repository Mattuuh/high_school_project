<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('legajo_emp')->nullable();              
            $table->float('monto_inicial');
            $table->float('monto_cierre');
            $table->date('fecha_caja');                     
            $table->timestamps();

            $table->foreign('legajo_emp')->references('id')
            ->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
