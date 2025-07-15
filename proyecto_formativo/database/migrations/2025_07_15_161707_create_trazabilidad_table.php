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
        Schema::create('trazabilidad', function (Blueprint $table) {
            $table->id('id_trazabilidad');
            $table->unsignedBigInteger('fk_id_elemento');
            $table->text('tipo_movimiento');
            $table->date('fecha');
            $table->unsignedBigInteger('bodega_origen')->nullable();
            $table->unsignedBigInteger('bodega_destino')->nullable();
            $table->text('estado_actual');
            $table->foreign('fk_id_elemento')->references('id_elemento')->on('elementos');
            $table->foreign('bodega_origen')->references('id_bodega')->on('bodegas');
            $table->foreign('bodega_destino')->references('id_bodega')->on('bodegas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trazabilidad');
    }
};
