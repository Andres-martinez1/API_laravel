<?php

namespace App\Http\Controllers;

use App\Models\Opcion;
use App\Http\Requests\Opcion\StoreRequest;
use App\Http\Requests\Opcion\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class OpcionController extends Controller
{
    public function index()
    {
        $opciones = Opcion::with('modulo')->get();
        return response()->json($opciones, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $opcion = Opcion::create($request->validated());

            return response()->json([
                'message' => 'Opción creada correctamente',
                'data' => $opcion,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al crear la opción',
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
        $opcion = Opcion::with('modulo')->findOrFail($id);
        return response()->json($opcion, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $opcion = Opcion::findOrFail($id);
            $opcion->update($request->validated());

            return response()->json([
                'message' => 'Opción actualizada correctamente',
                'data' => $opcion,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar la opción',
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
            $opcion = Opcion::findOrFail($id);
            $opcion->delete();

            return response()->json([
                'message' => 'Opción eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la opción',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
