<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Http\Requests\Detalle\StoreRequest;
use App\Http\Requests\Detalle\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class DetalleController extends Controller
{
    public function index()
    {
        $detalles = Detalle::with(['ficha', 'elemento', 'solicitud'])->get();
        return response()->json($detalles, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $detalle = Detalle::create($request->validated());

            return response()->json([
                'message' => 'Detalle creado correctamente',
                'data' => $detalle,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo crear el detalle',
                'detalles' => 'Verifique las claves foráneas',
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
        $detalle = Detalle::with(['ficha', 'elemento', 'solicitud'])->findOrFail($id);
        return response()->json($detalle, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $detalle = Detalle::findOrFail($id);
            $detalle->update($request->validated());

            return response()->json([
                'message' => 'Detalle actualizado correctamente',
                'data' => $detalle,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo actualizar el detalle',
                'detalles' => 'Verifique las relaciones o datos inválidos',
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
            $detalle = Detalle::findOrFail($id);
            $detalle->delete();

            return response()->json([
                'message' => 'Detalle eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar el detalle',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
