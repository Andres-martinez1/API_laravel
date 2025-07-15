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
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id('id_movimientos');
            $table->unsignedBigInteger('fk_id_usuario');
            $table->unsignedBigInteger('fk_id_elemento');
            $table->date('fecha');
            $table->text('responsable');
            $table->text('pedir');
            $table->text('suministrar');
            $table->text('devolver');
            $table->foreign('fk_id_usuario')->references('id_usuario')->on('usuarios');
            $table->foreign('fk_id_elemento')->references('id_elemento')->on('elementos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos');
    }
};
