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
        Schema::create('detalles_entrega', function (Blueprint $table) {
            $table->id('id_detalle_entrega');
            $table->unsignedBigInteger('id_entrega');
            $table->unsignedBigInteger('id_instructor_receptor');
            $table->unsignedBigInteger('id_ficha_formacion');
            $table->boolean('visto_bueno_aprendiz');
            $table->foreign('id_entrega')->references('id_entrega')->on('entrega_material');
            $table->foreign('id_instructor_receptor')->references('id_usuario')->on('usuarios');
            $table->foreign('id_ficha_formacion')->references('id_ficha')->on('ficha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_entrega');
    }
};
