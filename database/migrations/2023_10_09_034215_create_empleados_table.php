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
        Schema::create('empleados', function (Blueprint $table) {
            $table->integer('legajo_emp')->primary();
            $table->string('nomb_ape');
            $table->integer('dni_emp');
            $table->string('domicilio_emp');
            $table->integer('telefono_emp');
            $table->string('email_emp');
            $table->date('fecha_ingreso');
            $table->date('fecha_egreso');
            $table->unsignedBigInteger('tipo_emp');      
            $table->timestamps();

            $table->foreign('tipo_emp')->references('id')
            ->on('tipos_empleados');
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};