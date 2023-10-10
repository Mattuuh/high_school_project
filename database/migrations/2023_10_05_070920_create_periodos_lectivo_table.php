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
        Schema::create('periodos_lectivo', function (Blueprint $table) {
            $table->integer('anio')->primary(); 
            $table->string('plan_estudio_pl');
            $table->string('modalidad_pl');                 
            $table->timestamps();           
        });  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('periodos_lectivo');
    }
};