<?php

namespace App\Http\Controllers;

use App\Models\Municipio;
use App\Http\Requests\Municipio\StoreRequest;
use App\Http\Requests\Municipio\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class MunicipioController extends Controller
{
    public function index()
    {
        $municipios = Municipio::all();
        return response()->json($municipios, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $municipio = Municipio::create($request->validated());

            return response()->json([
                'message' => 'Municipio creado correctamente',
                'data' => $municipio,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al crear el municipio',
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
        $municipio = Municipio::findOrFail($id);
        return response()->json($municipio, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $municipio = Municipio::findOrFail($id);
            $municipio->update($request->validated());

            return response()->json([
                'message' => 'Municipio actualizado correctamente',
                'data' => $municipio,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar el municipio',
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
            $municipio = Municipio::findOrFail($id);
            $municipio->delete();

            return response()->json([
                'message' => 'Municipio eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar el municipio',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
