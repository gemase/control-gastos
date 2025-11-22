<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Models\FormaPago;
use Exception;

class FormaPagoController extends Controller
{
    /**
     * Devuelve todas las formas de pago.
     * @return \Illuminate\Http\JsonResponse
     */
    public function consultarTodos()
    {
        try {
            $formasPago = FormaPago::all();
            return response()->json(['status' => true, 'data' => $formasPago], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => ['message' => $e->getMessage()]], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
