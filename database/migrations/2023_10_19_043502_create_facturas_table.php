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
        Schema::create('facturas', function (Blueprint $table) {
            $table->id();       
            $table->unsignedBigInteger('id_caja');
            $table->unsignedBigInteger('id_alumno');
            $table->unsignedBigInteger('id_forma_pago');
            $table->unsignedBigInteger('id_cuota');
            $table->float('total');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_caja')->references('id')
            ->on('cajas');
            $table->foreign('id_alumno')->references('id')
            ->on('alumnos');
            $table->foreign('id_forma_pago')->references('id')
            ->on('formas_pagos');
            $table->foreign('id_cuota')->references('id')
            ->on('cuotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturas');
    }
};
