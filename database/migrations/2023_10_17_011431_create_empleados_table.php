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
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dni');
            $table->string('domicilio')->nullable();
            $table->unsignedBigInteger('telefono')->nullable();
            $table->string('email')->nullable();
            $table->unsignedBigInteger('tipo_emp')->nullable();      
            $table->timestamps();
            $table->softDeletes();

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
