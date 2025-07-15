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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->unsignedBigInteger('identificacion');
            $table->text('nombres');
            $table->text('apellidos');
            $table->text('correo');
            $table->text('password');

            $table->unsignedBigInteger('fk_id_area');
            $table->unsignedBigInteger('fk_id_rol');

            $table->foreign('fk_id_area')->references('id_area')->on('areas')->onUpdate('cascade');
            $table->foreign('fk_id_rol')->references('id_rol')->on('roles');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
