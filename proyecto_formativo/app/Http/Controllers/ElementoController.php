<?php

namespace App\Http\Controllers;

use App\Models\Elemento;
use App\Http\Requests\Elemento\StoreRequest;
use App\Http\Requests\Elemento\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class ElementoController extends Controller
{
    public function index()
    {
        $elementos = Elemento::with('bodega')->get();
        return response()->json($elementos, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $elemento = Elemento::create($request->validated());

            return response()->json([
                'message' => 'Elemento creado correctamente',
                'data' => $elemento,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en la base de datos',
                'detalles' => 'Verifique la relación con la bodega',
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
        $elemento = Elemento::with('bodega')->findOrFail($id);
        return response()->json($elemento, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $elemento = Elemento::findOrFail($id);
            $elemento->update($request->validated());

            return response()->json([
                'message' => 'Elemento actualizado correctamente',
                'data' => $elemento,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar',
                'detalles' => 'Verifique las relaciones o campos inválidos',
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
            $elemento = Elemento::findOrFail($id);
            $elemento->delete();

            return response()->json([
                'message' => 'Elemento eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar el elemento',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
