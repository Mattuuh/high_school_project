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
            $table->string('nombre');
            $table->string('apellido');
            $table->integer('dni');
            $table->string('domicilio');
            $table->unsignedBigInteger('telefono')->nullable();
            $table->string('email')->nullable();
            $table->boolean('habilitado')->default(0);
            $table->unsignedBigInteger('id_curso')->nullable();      
            $table->timestamps();
            $table->softDeletes();

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