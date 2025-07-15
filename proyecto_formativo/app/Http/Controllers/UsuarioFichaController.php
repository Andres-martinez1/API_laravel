<?php

namespace App\Http\Controllers;

use App\Models\UsuarioFicha;
use App\Http\Requests\UsuarioFicha\StoreRequest;
use Illuminate\Database\QueryException;
use Exception;

class UsuarioFichaController extends Controller
{
    public function index()
    {
        return response()->json(
            UsuarioFicha::with(['usuario', 'ficha'])->get(),
            200
        );
    }

    public function store(StoreRequest $request)
    {
        try {
            $relacion = UsuarioFicha::create($request->validated());

            return response()->json([
                'message' => 'Relación usuario-ficha creada correctamente',
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
            $relacion = UsuarioFicha::findOrFail($id);
            $relacion->delete();

            return response()->json([
                'message' => 'Relación eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar la relación',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
