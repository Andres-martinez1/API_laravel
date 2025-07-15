<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Http\Requests\Rol\StoreRequest;
use App\Http\Requests\Rol\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class RolController extends Controller
{
    public function index()
    {
        return response()->json(Rol::all(), 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $rol = Rol::create($request->validated());

            return response()->json([
                'message' => 'Rol creado correctamente',
                'data' => $rol,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al crear el rol',
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
        $rol = Rol::findOrFail($id);
        return response()->json($rol, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $rol = Rol::findOrFail($id);
            $rol->update($request->validated());

            return response()->json([
                'message' => 'Rol actualizado correctamente',
                'data' => $rol,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar el rol',
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
            $rol = Rol::findOrFail($id);
            $rol->delete();

            return response()->json([
                'message' => 'Rol eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar el rol',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
