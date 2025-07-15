<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Http\Requests\Entrada\StoreRequest;
use App\Http\Requests\Entrada\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class EntradaController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with(['bodega', 'elemento'])->get();
        return response()->json($entradas, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $entrada = Entrada::create($request->validated());

            return response()->json([
                'message' => 'Entrada creada correctamente',
                'data' => $entrada,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la base de datos',
                'detalles' => 'Revisa las claves foráneas o campos inválidos.',
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
        $entrada = Entrada::with(['bodega', 'elemento'])->findOrFail($id);
        return response()->json($entrada, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $entrada = Entrada::findOrFail($id);
            $entrada->update($request->validated());

            return response()->json([
                'message' => 'Entrada actualizada correctamente',
                'data' => $entrada,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la actualización',
                'detalles' => 'Verifica relaciones o valores incorrectos.',
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
            $entrada = Entrada::findOrFail($id);
            $entrada->delete();

            return response()->json([
                'message' => 'Entrada eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la entrada',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
