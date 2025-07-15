<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Http\Requests\Sede\StoreRequest;
use App\Http\Requests\Sede\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class SedeController extends Controller
{
    public function index()
    {
        return response()->json(Sede::with('centro')->get(), 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $sede = Sede::create($request->validated());

            return response()->json([
                'message' => 'Sede creada correctamente',
                'data' => $sede,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo crear la sede',
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
        $sede = Sede::with('centro')->findOrFail($id);
        return response()->json($sede, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $sede = Sede::findOrFail($id);
            $sede->update($request->validated());

            return response()->json([
                'message' => 'Sede actualizada correctamente',
                'data' => $sede,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo actualizar la sede',
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
            $sede = Sede::findOrFail($id);
            $sede->delete();

            return response()->json([
                'message' => 'Sede eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar la sede',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
