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
        Schema::create('asistencia_alumnos', function (Blueprint $table) {
            $table->unsignedBigInteger('legajo_alu')->primary();
            $table->date('fecha')->primary();
            $table->unsignedBigInteger('id_estado');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('legajo_alu')->references('id')
            ->on('alumnos');
            $table->foreign('id_estado')->references('id')
            ->on('estados_asistencias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencia_alumnos');
    }
};
