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
            $table->id('legajo_emp');
            $table->string('nombre_emp');
            $table->string('apellido_emp');
            $table->integer('dni_emp');
            $table->string('domicilio_emp');
            $table->integer('telefono_emp');
            $table->string('email_emp');
            $table->date('fecha_ingreso_emp');
            $table->date('fecha_egreso_emp');
            $table->unsignedBigInteger('tipo_emp')->nullable();

            $table->foreign('tipo_emp')->references('id')
            ->on('tipos_empleados');
            $table->timestamps();
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
