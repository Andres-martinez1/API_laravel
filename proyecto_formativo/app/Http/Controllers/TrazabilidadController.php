<?php

namespace App\Http\Controllers;

use App\Models\Trazabilidad;
use App\Http\Requests\Trazabilidad\StoreRequest;
use App\Http\Requests\Trazabilidad\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class TrazabilidadController extends Controller
{
    public function index()
    {
        return response()->json(
            Trazabilidad::with(['elemento', 'origen', 'destino'])->get(),
            200
        );
    }

    public function store(StoreRequest $request)
    {
        try {
            $trazabilidad = Trazabilidad::create($request->validated());

            return response()->json([
                'message' => 'Registro de trazabilidad creado correctamente',
                'data' => $trazabilidad,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la base de datos',
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
        $trazabilidad = Trazabilidad::with(['elemento', 'origen', 'destino'])->findOrFail($id);
        return response()->json($trazabilidad, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $trazabilidad = Trazabilidad::findOrFail($id);
            $trazabilidad->update($request->validated());

            return response()->json([
                'message' => 'Registro de trazabilidad actualizado correctamente',
                'data' => $trazabilidad,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar en base de datos',
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
            $trazabilidad = Trazabilidad::findOrFail($id);
            $trazabilidad->delete();

            return response()->json([
                'message' => 'Registro eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar el registro',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
