<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Http\Requests\Area\StoreRequest;
use App\Http\Requests\Area\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class AreaController extends Controller
{
    public function index()
    {
        $areas = Area::with('sede')->get();

        return response()->json($areas, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $area = Area::create($request->validated());

            return response()->json([
                'message' => 'Área creada correctamente',
                'data' => $area,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo crear el área',
                'detalles' => 'La sede seleccionada no existe o no es válida',
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
        $area = Area::with('sede')->findOrFail($id);

        return response()->json($area, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $area = Area::findOrFail($id);
            $area->update($request->validated());

            return response()->json([
                'message' => 'Área actualizada correctamente',
                'data' => $area,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo actualizar el área',
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
            $area = Area::findOrFail($id);
            $area->delete();

            return response()->json([
                'message' => 'Área eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar el área',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
