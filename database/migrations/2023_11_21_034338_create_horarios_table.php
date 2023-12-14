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
        Schema::create('horarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('docente');
            $table->unsignedBigInteger('materia');
            $table->unsignedBigInteger('hora_clase');
            $table->unsignedBigInteger('curso');
            $table->unsignedBigInteger('id_dia');
            $table->timestamps();

            $table->foreign('docente')->references('legajo_emp')
            ->on('empleados');
            $table->foreign('materia')->references('id')
            ->on('materias');
            $table->foreign('hora_clase')->references('id')
            ->on('horas');
            $table->foreign('curso')->references('id')
            ->on('cursos');
            $table->foreign('id_dia')->references('id')
            ->on('dias');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios');
        
    }

   
};
