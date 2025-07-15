<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use App\Http\Requests\Programa\StoreRequest;
use App\Http\Requests\Programa\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class ProgramaController extends Controller
{
    public function index()
    {
        return response()->json(Programa::all(), 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $programa = Programa::create($request->validated());

            return response()->json([
                'message' => 'Programa creado correctamente',
                'data' => $programa,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al crear el programa',
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
        $programa = Programa::findOrFail($id);
        return response()->json($programa, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $programa = Programa::findOrFail($id);
            $programa->update($request->validated());

            return response()->json([
                'message' => 'Programa actualizado correctamente',
                'data' => $programa,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar el programa',
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
            $programa = Programa::findOrFail($id);
            $programa->delete();

            return response()->json([
                'message' => 'Programa eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar el programa',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
