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
        Schema::create('entrega_material', function (Blueprint $table) {
            $table->id('id_entrega');
            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_usuario_responsable');
            $table->date('fecha_entrega');
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitudes');
            $table->foreign('id_usuario_responsable')->references('id_usuario')->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entrega_material');
    }
};
