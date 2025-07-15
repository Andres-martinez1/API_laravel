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
        Schema::create('elementos', function (Blueprint $table) {
            $table->id('id_elemento');
            $table->text('nombre_elemento');
            $table->decimal('stock');
            $table->text('clasificacion');
            $table->text('ficha_tecnica');
            $table->text('uso');
            $table->text('estado');
            $table->text('serial');
            $table->unsignedBigInteger('fk_id_bodega')->nullable();
            $table->text('tipo')->nullable();
            $table->date('fecha_salida')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_caducidad')->nullable();
            $table->foreign('fk_id_bodega')->references('id_bodega')->on('bodegas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos');
    }
};
