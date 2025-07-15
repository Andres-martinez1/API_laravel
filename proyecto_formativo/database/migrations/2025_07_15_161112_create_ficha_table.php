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
        Schema::create('ficha', function (Blueprint $table) {
            $table->id('id_ficha');
            $table->string('numero_ficha', 20);

            $table->unsignedBigInteger('fk_id_programa');
            $table->unsignedBigInteger('fk_id_municipio');
            $table->unsignedBigInteger('fk_id_sede');

            $table->foreign('fk_id_programa')->references('id_programa')->on('programas');
            $table->foreign('fk_id_municipio')->references('id_municipio')->on('municipio');
            $table->foreign('fk_id_sede')->references('id_sedes')->on('sedes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha');
    }
};
