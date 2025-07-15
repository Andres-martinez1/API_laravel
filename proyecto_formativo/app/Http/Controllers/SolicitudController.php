<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Http\Requests\Solicitud\StoreRequest;
use App\Http\Requests\Solicitud\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class SolicitudController extends Controller
{
    public function index()
    {
        return response()->json(Solicitud::with('usuario')->get(), 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $solicitud = Solicitud::create($request->validated());

            return response()->json([
                'message' => 'Solicitud creada correctamente',
                'data' => $solicitud,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo crear la solicitud',
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
        $solicitud = Solicitud::with('usuario')->findOrFail($id);
        return response()->json($solicitud, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $solicitud = Solicitud::findOrFail($id);
            $solicitud->update($request->validated());

            return response()->json([
                'message' => 'Solicitud actualizada correctamente',
                'data' => $solicitud,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'No se pudo actualizar la solicitud',
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
            $solicitud = Solicitud::findOrFail($id);
            $solicitud->delete();

            return response()->json([
                'message' => 'Solicitud eliminada correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar la solicitud',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
