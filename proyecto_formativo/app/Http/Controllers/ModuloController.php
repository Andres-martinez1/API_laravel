<?php

namespace App\Http\Controllers;

use App\Models\Modulo;
use App\Http\Requests\Modulo\StoreRequest;
use App\Http\Requests\Modulo\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class ModuloController extends Controller
{
    public function index()
    {
        $modulos = Modulo::all();
        return response()->json($modulos, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $modulo = Modulo::create($request->validated());

            return response()->json([
                'message' => 'Módulo creado correctamente',
                'data' => $modulo,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al guardar el módulo',
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
        $modulo = Modulo::findOrFail($id);
        return response()->json($modulo, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $modulo = Modulo::findOrFail($id);
            $modulo->update($request->validated());

            return response()->json([
                'message' => 'Módulo actualizado correctamente',
                'data' => $modulo,
            ]);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar el módulo',
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
            $modulo = Modulo::findOrFail($id);
            $modulo->delete();

            return response()->json([
                'message' => 'Módulo eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar el módulo',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
