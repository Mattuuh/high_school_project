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
        Schema::create('docentes_materias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_materia');
            $table->unsignedBigInteger('id_docente');
            $table->unsignedBigInteger('id_curso');
            $table->string('horario')->nullable();
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('id_materia')->references('id')
            ->on('materias');
            $table->foreign('id_docente')->references('legajo_emp')
            ->on('empleados');
            $table->foreign('id_curso')->references('id')
            ->on('cursos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes_materias');
    }
};