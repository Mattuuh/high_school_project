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
        Schema::create('detalles_facturas', function (Blueprint $table) {
            $table->unsignedBigInteger('n_factura');
            $table->unsignedBigInteger('id_cuota');
            $table->float('subtotal');               
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('n_factura')->references('id')
            ->on('facturas');
            $table->foreign('id_cuota')->references('id')
            ->on('cuotas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_facturas');
    }
};