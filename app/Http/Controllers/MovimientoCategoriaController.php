<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovimientoCategoria\CreaMovimientoCategoriaRequest;
use App\Http\Requests\MovimientoCategoria\EditaEstatusMovimientoCategoriaRequest;
use App\Http\Requests\MovimientoCategoria\EditaMovimientoCategoriaRequest;
use Exception;
use Illuminate\Http\Response;
use App\Models\MovimientoCategoria;
use Illuminate\Http\Request;

class MovimientoCategoriaController extends Controller
{
    /**
     * Crear una nueva categoría de movimiento.
     * @param CreaMovimientoCategoriaRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function creaMovimientoCategoria(CreaMovimientoCategoriaRequest $request)
    {
        try {
            $datosValidados = $request->validated();
            $datosValidados['id_usuario'] = $request->user()->id;

            //Se valida que el nombre y el usuario sean únicos.
            $existe = MovimientoCategoria::where('id_usuario', $datosValidados['id_usuario'])
                ->where('nombre', $datosValidados['nombre'])->exists();

            if ($existe) {
                return response()->json([
                    'status' => false,
                    'error' => ['message' => 'El nombre de categoría de movimiento ya existe.']
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $categoria = MovimientoCategoria::create($datosValidados);
            return response()->json(['status' => true, 'data' => $categoria], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => ['message' => $e->getMessage()]], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Devuelve las categorías de movimientos.
     * @return \Illuminate\Http\JsonResponse
     */
    public function consultarTodos(Request $request)
    {
        try {
            $id_usuario = $request->user()->id;
            $categorias = MovimientoCategoria::where('id_usuario', $id_usuario)->get();
            return response()->json(['status' => true, 'data' => $categorias], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => ['message' => $e->getMessage()]], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Devuelve una categoría de movimiento de manera individual.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function consultarPorId(Request $request, $id)
    {
        try {
            $id_usuario = $request->user()->id;
            $categoria = MovimientoCategoria::where('id_usuario', $id_usuario)
                ->where('id', $id)->first();

            if (!$categoria) {
                return response()->json([
                    'status' => false,
                    'error' => ['message' => 'La categoría de movimiento no fue encontrada.']
                ], Response::HTTP_NOT_FOUND);
            }

            return response()->json(['status' => true, 'data' => $categoria], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => ['message' => $e->getMessage()]], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Editar una categoría de movimiento.
     * @param EditaMovimientoCategoriaRequest $request
     * @param int $id Identificador movimiento categoría
     * @return \Illuminate\Http\JsonResponse
     */
    public function editarMovimientoCategoria(EditaMovimientoCategoriaRequest $request, $id)
    {
        try {
            $datosValidados = $request->validated();
            $id_usuario = $request->user()->id;

            $categoria = MovimientoCategoria::where('id_usuario', $id_usuario)
                ->where('id', $id)->first();

            //Se valida que la categoría exista.
            if (!$categoria) {
                return response()->json([
                    'status' => false,
                    'error' => ['message' => 'La categoría de movimiento no fue encontrada.']
                ], Response::HTTP_NOT_FOUND);
            }

            //Se valida que el nombre y el usuario sean únicos.
            $existe = MovimientoCategoria::where('id_usuario', $id_usuario)
                ->where('nombre', $datosValidados['nombre'])
                ->where('id', '!=', $id)->exists();

            if ($existe) {
                return response()->json([
                    'status' => false,
                    'error' => ['message' => 'El nombre de categoría de movimiento ya existe.']
                ], Response::HTTP_UNPROCESSABLE_ENTITY);
            }

            $categoria->update($datosValidados);

            return response()->json(['status' => true, 'data' => $categoria], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => ['message' => $e->getMessage()]], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    /**
     * Editar el estatus de una categoría de movimiento.
     * @param EditaEstatusMovimientoCategoriaRequest $request
     * @param int $id Identificador movimiento categoría
     * @return \Illuminate\Http\JsonResponse
     */
    public function editarEstatusMovimientoCategoria(EditaEstatusMovimientoCategoriaRequest $request, $id)
    {
        try {
            $datosValidados = $request->validated();
            $id_usuario = $request->user()->id;

            $categoria = MovimientoCategoria::where('id_usuario', $id_usuario)
                ->where('id', $id)->first();

            //Se valida que la categoría exista.
            if (!$categoria) {
                return response()->json([
                    'status' => false,
                    'error' => ['message' => 'La categoría de movimiento no fue encontrada.']
                ], Response::HTTP_NOT_FOUND);
            }

            $categoria->update($datosValidados);

            return response()->json(['status' => true, 'data' => $categoria], Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json(['status' => false, 'error' => ['message' => $e->getMessage()]], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
