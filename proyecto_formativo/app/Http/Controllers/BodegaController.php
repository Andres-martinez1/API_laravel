<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Http\Requests\Bodega\StoreRequest;
use App\Http\Requests\Bodega\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class BodegaController extends Controller
{
    public function index()
    {
        $bodegas = Bodega::with('sede')->get();
        return response()->json($bodegas, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $bodega = Bodega::create($request->validated());

            return response()->json([
                'message' => 'Bodega creada correctamente',
                'data' => $bodega,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error de base de datos',
                'detalles' => 'La sede no existe o hay un problema con los datos',
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
        $bodega = Bodega::with('sede')->findOrFail($id);
        return response()->json($bodega, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $bodega = Bodega::findOrFail($id);
            $bodega->update($request->validated());

            return response()->json([
                'message' => 'Bodega actualizada correctamente',
                'data' => $bodega,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error de base de datos',
                'detalles' => 'Revise si la sede existe o si hay datos inválidos',
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
            $bodega = Bodega::findOrFail($id);
            $bodega->delete();

            return response()->json([
                'message' => 'Bodega eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar la bodega',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
