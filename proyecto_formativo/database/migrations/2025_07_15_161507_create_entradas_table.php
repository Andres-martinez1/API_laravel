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
        Schema::create('entradas', function (Blueprint $table) {
            $table->id('id_entrada');
            $table->unsignedBigInteger('fk_id_bodega');
            $table->unsignedBigInteger('fk_id_elemento');
            $table->decimal('cantidad_ingresada');
            $table->text('proveedor');
            $table->date('fecha_ingreso');
            $table->foreign('fk_id_bodega')->references('id_bodega')->on('bodegas');
            $table->foreign('fk_id_elemento')->references('id_elemento')->on('elementos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
