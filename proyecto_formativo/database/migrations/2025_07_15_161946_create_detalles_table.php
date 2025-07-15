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
        Schema::create('detalles', function (Blueprint $table) {
            $table->id();
            $table->text('movimiento');
            $table->unsignedBigInteger('fk_id_elemento');
            $table->text('asignado');
            $table->text('estado');
            $table->date('retorno');
            $table->date('fecha');
            $table->unsignedBigInteger('fk_id_ficha');
            $table->unsignedBigInteger('id_solicitud');
            $table->foreign('fk_id_ficha')->references('id_ficha')->on('ficha');
            $table->foreign('fk_id_elemento')->references('id_elemento')->on('elementos');
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitudes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles');
    }
};
