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
        Schema::create('detalle_solicitud', function (Blueprint $table) {
            $table->id('id_detalle_solicitud');
            $table->unsignedBigInteger('id_solicitud');
            $table->unsignedBigInteger('id_producto');
            $table->decimal('cantidad_solicitada');
            $table->text('observaciones')->nullable();
            $table->foreign('id_solicitud')->references('id_solicitud')->on('solicitudes');
            $table->foreign('id_producto')->references('id_elemento')->on('elementos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_solicitud');
    }
};
