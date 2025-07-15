<?php

namespace App\Http\Controllers;

use App\Models\UsuarioBodega;
use App\Http\Requests\UsuarioBodega\StoreRequest;
use Illuminate\Database\QueryException;
use Exception;

class UsuarioBodegaController extends Controller
{
    public function index()
    {
        return response()->json(
            UsuarioBodega::with(['usuario', 'bodega'])->get(),
            200
        );
    }

    public function store(StoreRequest $request)
    {
        try {
            $relacion = UsuarioBodega::create($request->validated());

            return response()->json([
                'message' => 'Relación usuario-bodega creada correctamente',
                'data' => $relacion,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo crear la relación',
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
            $relacion = UsuarioBodega::findOrFail($id);
            $relacion->delete();

            return response()->json([
                'message' => 'Relación eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
