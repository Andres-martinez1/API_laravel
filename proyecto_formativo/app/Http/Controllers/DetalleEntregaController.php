<?php

namespace App\Http\Controllers;

use App\Models\DetalleEntrega;
use App\Http\Requests\DetalleEntrega\StoreRequest;
use App\Http\Requests\DetalleEntrega\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class DetalleEntregaController extends Controller
{
    public function index()
    {
        $data = DetalleEntrega::with(['entrega', 'instructor', 'ficha'])->get();
        return response()->json($data, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $detalle = DetalleEntrega::create($request->validated());

            return response()->json([
                'message' => 'Detalle de entrega creado correctamente',
                'data' => $detalle,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en base de datos',
                'detalles' => 'Relación no válida o datos incorrectos',
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error inesperado',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }

    public function show($id)
    {
        $detalle = DetalleEntrega::with(['entrega', 'instructor', 'ficha'])->findOrFail($id);
        return response()->json($detalle, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $detalle = DetalleEntrega::findOrFail($id);
            $detalle->update($request->validated());

            return response()->json([
                'message' => 'Detalle de entrega actualizado correctamente',
                'data' => $detalle,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo actualizar',
                'detalles' => 'Verifique claves foráneas o datos inválidos',
            ], 400);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error inesperado',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $detalle = DetalleEntrega::findOrFail($id);
            $detalle->delete();

            return response()->json([
                'message' => 'Detalle de entrega eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
