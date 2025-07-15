<?php

namespace App\Http\Controllers;

use App\Models\EntregaMaterial;
use App\Http\Requests\EntregaMaterial\StoreRequest;
use App\Http\Requests\EntregaMaterial\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class EntregaMaterialController extends Controller
{
    public function index()
    {
        $entregas = EntregaMaterial::with(['solicitud', 'usuario'])->get();
        return response()->json($entregas, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $entrega = EntregaMaterial::create($request->validated());

            return response()->json([
                'message' => 'Entrega registrada correctamente',
                'data' => $entrega,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al registrar la entrega',
                'detalles' => 'Verifica relaciones o datos inválidos.',
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
        $entrega = EntregaMaterial::with(['solicitud', 'usuario'])->findOrFail($id);
        return response()->json($entrega, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $entrega = EntregaMaterial::findOrFail($id);
            $entrega->update($request->validated());

            return response()->json([
                'message' => 'Entrega actualizada correctamente',
                'data' => $entrega,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la actualización',
                'detalles' => 'Verifica datos relacionados.',
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
            $entrega = EntregaMaterial::findOrFail($id);
            $entrega->delete();

            return response()->json([
                'message' => 'Entrega eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la entrega',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
