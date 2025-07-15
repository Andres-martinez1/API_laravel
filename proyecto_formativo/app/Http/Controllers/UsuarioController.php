<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use App\Http\Requests\Usuario\StoreRequest;
use App\Http\Requests\Usuario\UpdateRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\QueryException;
use Exception;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(
            Usuario::with(['area', 'rol'])->get(),
            200
        );
    }

    public function store(StoreRequest $request)
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make($data['password']);

            $usuario = Usuario::create($data);

            return response()->json([
                'message' => 'Usuario creado correctamente',
                'data' => $usuario,
            ], 201);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error en base de datos',
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
        $usuario = Usuario::with(['area', 'rol'])->findOrFail($id);
        return response()->json($usuario, 200);
    }

    public function update(UpdateRequest $request, $id)
    {
        try {
            $usuario = Usuario::findOrFail($id);
            $data = $request->validated();

            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }

            $usuario->update($data);

            return response()->json([
                'message' => 'Usuario actualizado correctamente',
                'data' => $usuario,
            ], 200);
        } catch (QueryException $e) {
            return response()->json([
                'error' => 'Error al actualizar en base de datos',
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
            $usuario = Usuario::findOrFail($id);
            $usuario->delete();

            return response()->json([
                'message' => 'Usuario eliminado correctamente',
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'No se pudo eliminar el usuario',
                'detalles' => $e->getMessage(),
            ], 500);
        }
    }
}
