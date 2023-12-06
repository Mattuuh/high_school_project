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
        Schema::create('cajas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('legajo_emp');              
            $table->float('monto_inicial');
            $table->float('monto_cierre')->default('0.0');     
            $table->dateTime('closed_at')->default('1900-01-01 00:00:00');            
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('legajo_emp')->references('legajo_emp')
            ->on('empleados');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cajas');
    }
};
