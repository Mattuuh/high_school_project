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
        Schema::create('registro_academicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_docxmat');
            $table->integer('nota');
            $table->date('fecha');
            $table->unsignedBigInteger('id_instancia');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_alumno')->references('id')
            ->on('alumnos');
            $table->foreign('id_docxmat')->references('id')
            ->on('docentes_materias');
            $table->foreign('id_instancia')->references('id')
            ->on('instancias');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registro_academicos');
    }
};
