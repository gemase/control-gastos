<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormaPagoController;

Route::middleware('auth:sanctum')->group(function () {
    /**
     * Devuelve todas las formas de pago.
     */
    Route::get('/formas-pago', [FormaPagoController::class, 'consultarTodos']);
});
