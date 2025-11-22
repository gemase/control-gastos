<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MovimientoCategoriaController;

Route::middleware('auth:sanctum')->group(function () {
    /**
     * Crear una nueva categoría de movimiento.
     */
    Route::post('/movimiento-categorias', [MovimientoCategoriaController::class, 'creaMovimientoCategoria']);

    /**
     * Devuelve categorías de movimientos.
     */
    Route::get('/movimiento-categorias', [MovimientoCategoriaController::class, 'consultarTodos']);

    /**
     * Devuelve una categoría de movimiento de manera individual.
     */
    Route::get('/movimiento-categorias/{id}', [MovimientoCategoriaController::class, 'consultarPorId']);

    /**
     * Editar una categoría de movimiento.
     */
    Route::put('/movimiento-categorias/{id}', [MovimientoCategoriaController::class, 'editarMovimientoCategoria']);

    /**
     * Editar el estatus de una categoría de movimiento.
     */
    Route::patch('/movimiento-categorias/{id}/estatus', [MovimientoCategoriaController::class, 'editarEstatusMovimientoCategoria']);
});
