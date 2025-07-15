<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Http\Requests\Centro\StoreRequest;
use App\Http\Requests\Centro\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class CentroController extends Controller
{
    public function index()
    {
        $centros = Centro::with('municipio')->get();
        return response()->json($centros, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $centro = Centro::create($request->validated());
            return response()->json([
                'message' => 'Centro creado correctamente',
                'data' => $centro,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo crear el centro',
                'detalles' => 'Verifique que el municipio exista',
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
        $centro = Centro::with('municipio')->findOrFail($id);
        return response()->json($centro, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $centro = Centro::findOrFail($id);
            $centro->update($request->validated());

            return response()->json([
                'message' => 'Centro actualizado correctamente',
                'data' => $centro,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo actualizar el centro',
                'detalles' => 'Verifique que el municipio exista',
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
            $centro = Centro::findOrFail($id);
            $centro->delete();

            return response()->json([
                'message' => 'Centro eliminado correctamente',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar el centro',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
