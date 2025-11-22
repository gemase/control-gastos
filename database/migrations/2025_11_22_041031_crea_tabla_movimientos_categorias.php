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
        Schema::create('movimientos_categorias', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->unsignedBigInteger('id_usuario');
            $table->string('nombre', 80);
            $table->text('descripcion')->nullable();
            $table->tinyInteger('estatus')->unsigned()->default(1);
            $table->timestamps();

            $table->unique(['id_usuario', 'nombre']);
            $table->foreign('id_usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimientos_categorias');
    }
};
