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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_alu');
            $table->string('apellido_alu');
            $table->integer('dni_alu');
            $table->string('domicilio_alu');
            $table->integer('telefono_alu');
            $table->string('email_alu');
            $table->date('fecha_inscrip_alu');            
            $table->unsignedBigInteger('id_curso')->nullable();      
            $table->timestamps();

            $table->foreign('id_curso')->references('id')
            ->on('cursos');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};