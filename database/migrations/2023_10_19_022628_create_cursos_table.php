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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->integer('cupos');           
            $table->integer('disponibilidad');                        
            $table->unsignedBigInteger('anio_lectivo')->nullable();
            $table->unsignedBigInteger('id_horario')->nullable();      
            $table->timestamps();

            $table->foreign('anio_lectivo')->references('id')
            ->on('periodos_lectivos');
            $table->foreign('id_horario')->references('id')
            ->on('horarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
