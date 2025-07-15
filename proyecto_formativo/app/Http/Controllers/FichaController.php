<?php

namespace App\Http\Controllers;

use App\Models\Ficha;
use App\Http\Requests\Ficha\StoreRequest;
use App\Http\Requests\Ficha\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class FichaController extends Controller
{
    public function index()
    {
        $fichas = Ficha::with(['programa', 'municipio', 'sede'])->get();
        return response()->json($fichas, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $ficha = Ficha::create($request->validated());

            return response()->json([
                'message' => 'Ficha creada correctamente',
                'data' => $ficha,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la base de datos',
                'detalles' => 'Revisa las relaciones o datos duplicados.',
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
        $ficha = Ficha::with(['programa', 'municipio', 'sede'])->findOrFail($id);
        return response()->json($ficha, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $ficha = Ficha::findOrFail($id);
            $ficha->update($request->validated());

            return response()->json([
                'message' => 'Ficha actualizada correctamente',
                'data' => $ficha,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error de actualización',
                'detalles' => 'Verifica los datos o relaciones.',
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
            $ficha = Ficha::findOrFail($id);
            $ficha->delete();

            return response()->json([
                'message' => 'Ficha eliminada correctamente',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar la ficha',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
