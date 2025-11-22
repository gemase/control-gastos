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
        Schema::create('formas_pago', function (Blueprint $table) {
            $table->string('clave', 6)->primary();
            $table->string('nombre', 80)->unique();
            $table->tinyInteger('estatus')->unsigned()->default(1);
            $table->timestamps();
            $table->comment('Formas de pago permitidas por el SAT');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formas_pago');
    }
};
