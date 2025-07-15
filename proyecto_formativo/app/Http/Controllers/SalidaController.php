<?php

namespace App\Http\Controllers;

use App\Models\Salida;
use App\Http\Requests\Salida\StoreRequest;
use App\Http\Requests\Salida\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class SalidaController extends Controller
{
    public function index()
    {
        return response()->json(Salida::with(['bodega', 'elemento'])->get(), 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $salida = Salida::create($request->validated());

            return response()->json([
                'message' => 'Salida registrada correctamente',
                'data' => $salida,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al registrar la salida',
                'detalles' => $e->getMessage(),
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
        $salida = Salida::with(['bodega', 'elemento'])->findOrFail($id);
        return response()->json($salida, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $salida = Salida::findOrFail($id);
            $salida->update($request->validated());

            return response()->json([
                'message' => 'Salida actualizada correctamente',
                'data' => $salida,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar la salida',
                'detalles' => $e->getMessage(),
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
            $salida = Salida::findOrFail($id);
            $salida->delete();

            return response()->json([
                'message' => 'Salida eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar la salida',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
