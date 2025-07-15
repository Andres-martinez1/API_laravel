<?php

namespace App\Http\Controllers;

use App\Models\Movimiento;
use App\Http\Requests\Movimiento\StoreRequest;
use App\Http\Requests\Movimiento\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class MovimientoController extends Controller
{
    public function index()
    {
        $movimientos = Movimiento::with(['usuario', 'elemento'])->get();
        return response()->json($movimientos, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $movimiento = Movimiento::create($request->validated());

            return response()->json([
                'message' => 'Movimiento creado correctamente',
                'data' => $movimiento,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al crear el movimiento',
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
        $movimiento = Movimiento::with(['usuario', 'elemento'])->findOrFail($id);
        return response()->json($movimiento, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $movimiento = Movimiento::findOrFail($id);
            $movimiento->update($request->validated());

            return response()->json([
                'message' => 'Movimiento actualizado correctamente',
                'data' => $movimiento,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar el movimiento',
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
            $movimiento = Movimiento::findOrFail($id);
            $movimiento->delete();

            return response()->json([
                'message' => 'Movimiento eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
