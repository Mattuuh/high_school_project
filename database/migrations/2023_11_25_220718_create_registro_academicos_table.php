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
            $table->unsignedBigInteger('legajo_alum');
            $table->unsignedBigInteger('asignatura');
            $table->integer('nota');
            $table->date('fecha');
            $table->unsignedBigInteger('id_instancia');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('legajo_alum')->references('id')
            ->on('alumnos');
            $table->foreign('asignatura')->references('id')
            ->on('horarios');
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
