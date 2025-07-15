<?php

namespace App\Http\Controllers;

use App\Models\DetalleSolicitud;
use App\Http\Requests\DetalleSolicitud\StoreRequest;
use App\Http\Requests\DetalleSolicitud\UpdateRequest;
use Illuminate\Database\QueryException;
use Exception;

class DetalleSolicitudController extends Controller
{
    public function index()
    {
        $detalles = DetalleSolicitud::with(['solicitud', 'producto'])->get();
        return response()->json($detalles, 200);
    }

    public function store(StoreRequest $request)
    {
        try {
            $detalle = DetalleSolicitud::create($request->validated());

            return response()->json([
                'message' => 'Detalle de solicitud creado correctamente',
                'data' => $detalle,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error de base de datos',
                'detalles' => 'Solicitud o producto no válidos',
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
        $detalle = DetalleSolicitud::with(['solicitud', 'producto'])->findOrFail($id);
        return response()->json($detalle, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $detalle = DetalleSolicitud::findOrFail($id);
            $detalle->update($request->validated());

            return response()->json([
                'message' => 'Detalle de solicitud actualizado correctamente',
                'data' => $detalle,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error de actualización',
                'detalles' => 'Verifique los datos o relaciones',
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
            $detalle = DetalleSolicitud::findOrFail($id);
            $detalle->delete();

            return response()->json([
                'message' => 'Detalle de solicitud eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al eliminar',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
