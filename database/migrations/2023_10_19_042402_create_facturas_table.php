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
            $table->dateTime('fecha_pago');          
            $table->unsignedBigInteger('id_caja')->nullable();
            $table->unsignedBigInteger('legajo_alu')->nullable();
            $table->unsignedBigInteger('id_forma_pago')->nullable();
            $table->float('total');  
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_caja')->references('id')
            ->on('cajas');
            $table->foreign('legajo_alu')->references('id')
            ->on('alumnos');
            $table->foreign('id_forma_pago')->references('id')
            ->on('formas_pagos');
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
