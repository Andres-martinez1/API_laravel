<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\DetalleController;
use App\Http\Controllers\DetalleEntregaController;
use App\Http\Controllers\DetalleSolicitudController;
use App\Http\Controllers\ElementoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\EntregaMaterialController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\ModuloController;
use App\Http\Controllers\MovimientoController;
use App\Http\Controllers\MunicipioController;
use App\Http\Controllers\OpcionController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\SalidaController;
use App\Http\Controllers\SedeController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TrazabilidadController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\UsuarioBodegaController;
use App\Http\Controllers\UsuarioFichaController;

Route::prefix('areas')->group(function () {
    Route::get('/', [AreaController::class, 'index']);       
    Route::post('/', [AreaController::class, 'store']);      
    Route::get('/{id}', [AreaController::class, 'show']);    
    Route::put('/{id}', [AreaController::class, 'update']);  
    Route::delete('/{id}', [AreaController::class, 'destroy']); 
});

Route::prefix('bodegas')->group(function () {
    Route::get('/', [BodegaController::class, 'index']);
    Route::post('/', [BodegaController::class, 'store']);
    Route::get('/{id}', [BodegaController::class, 'show']);
    Route::put('/{id}', [BodegaController::class, 'update']);
    Route::delete('/{id}', [BodegaController::class, 'destroy']);
});

Route::prefix('centros')->group(function () {
    Route::get('/', [CentroController::class, 'index']);
    Route::post('/', [CentroController::class, 'store']);
    Route::get('/{id}', [CentroController::class, 'show']);
    Route::put('/{id}', [CentroController::class, 'update']);
    Route::delete('/{id}', [CentroController::class, 'destroy']);
});

Route::prefix('detalles')->group(function () {
    Route::get('/', [DetalleController::class, 'index']);
    Route::post('/', [DetalleController::class, 'store']);
    Route::get('/{id}', [DetalleController::class, 'show']);
    Route::put('/{id}', [DetalleController::class, 'update']);
    Route::delete('/{id}', [DetalleController::class, 'destroy']);
});

Route::prefix('detalles-entrega')->group(function () {
    Route::get('/', [DetalleEntregaController::class, 'index']);
    Route::post('/', [DetalleEntregaController::class, 'store']);
    Route::get('/{id}', [DetalleEntregaController::class, 'show']);
    Route::put('/{id}', [DetalleEntregaController::class, 'update']);
    Route::delete('/{id}', [DetalleEntregaController::class, 'destroy']);
});

Route::prefix('detalle-solicitud')->group(function () {
    Route::get('/', [DetalleSolicitudController::class, 'index']);
    Route::post('/', [DetalleSolicitudController::class, 'store']);
    Route::get('/{id}', [DetalleSolicitudController::class, 'show']);
    Route::put('/{id}', [DetalleSolicitudController::class, 'update']);
    Route::delete('/{id}', [DetalleSolicitudController::class, 'destroy']);
});

Route::prefix('elementos')->group(function () {
    Route::get('/', [ElementoController::class, 'index']);
    Route::post('/', [ElementoController::class, 'store']);
    Route::get('/{id}', [ElementoController::class, 'show']);
    Route::put('/{id}', [ElementoController::class, 'update']);
    Route::delete('/{id}', [ElementoController::class, 'destroy']);
});

Route::prefix('entradas')->group(function () {
    Route::get('/', [EntradaController::class, 'index']);
    Route::post('/', [EntradaController::class, 'store']);
    Route::get('/{id}', [EntradaController::class, 'show']);
    Route::put('/{id}', [EntradaController::class, 'update']);
    Route::delete('/{id}', [EntradaController::class, 'destroy']);
});

Route::prefix('entregas')->group(function () {
    Route::get('/', [EntregaMaterialController::class, 'index']);
    Route::post('/', [EntregaMaterialController::class, 'store']);
    Route::get('/{id}', [EntregaMaterialController::class, 'show']);
    Route::put('/{id}', [EntregaMaterialController::class, 'update']);
    Route::delete('/{id}', [EntregaMaterialController::class, 'destroy']);
});

Route::prefix('fichas')->group(function () {
    Route::get('/', [FichaController::class, 'index']);
    Route::post('/', [FichaController::class, 'store']);
    Route::get('/{id}', [FichaController::class, 'show']);
    Route::put('/{id}', [FichaController::class, 'update']);
    Route::delete('/{id}', [FichaController::class, 'destroy']);
});

Route::prefix('modulos')->group(function () {
    Route::get('/', [ModuloController::class, 'index']);
    Route::post('/', [ModuloController::class, 'store']);
    Route::get('/{id}', [ModuloController::class, 'show']);
    Route::put('/{id}', [ModuloController::class, 'update']);
    Route::delete('/{id}', [ModuloController::class, 'destroy']);
});

Route::prefix('movimientos')->group(function () {
    Route::get('/', [MovimientoController::class, 'index']);
    Route::post('/', [MovimientoController::class, 'store']);
    Route::get('/{id}', [MovimientoController::class, 'show']);
    Route::put('/{id}', [MovimientoController::class, 'update']);
    Route::delete('/{id}', [MovimientoController::class, 'destroy']);
});

Route::prefix('municipios')->group(function () {
    Route::get('/', [MunicipioController::class, 'index']);
    Route::post('/', [MunicipioController::class, 'store']);
    Route::get('/{id}', [MunicipioController::class, 'show']);
    Route::put('/{id}', [MunicipioController::class, 'update']);
    Route::delete('/{id}', [MunicipioController::class, 'destroy']);
});

Route::prefix('opciones')->group(function () {
    Route::get('/', [OpcionController::class, 'index']);
    Route::post('/', [OpcionController::class, 'store']);
    Route::get('/{id}', [OpcionController::class, 'show']);
    Route::put('/{id}', [OpcionController::class, 'update']);
    Route::delete('/{id}', [OpcionController::class, 'destroy']);
});

Route::prefix('programas')->group(function () {
    Route::get('/', [ProgramaController::class, 'index']);
    Route::post('/', [ProgramaController::class, 'store']);
    Route::get('/{id}', [ProgramaController::class, 'show']);
    Route::put('/{id}', [ProgramaController::class, 'update']);
    Route::delete('/{id}', [ProgramaController::class, 'destroy']);
});

Route::prefix('roles')->group(function () {
    Route::get('/', [RolController::class, 'index']);
    Route::post('/', [RolController::class, 'store']);
    Route::get('/{id}', [RolController::class, 'show']);
    Route::put('/{id}', [RolController::class, 'update']);
    Route::delete('/{id}', [RolController::class, 'destroy']);
});

Route::prefix('salidas')->group(function () {
    Route::get('/', [SalidaController::class, 'index']);
    Route::post('/', [SalidaController::class, 'store']);
    Route::get('/{id}', [SalidaController::class, 'show']);
    Route::put('/{id}', [SalidaController::class, 'update']);
    Route::delete('/{id}', [SalidaController::class, 'destroy']);
});

Route::prefix('sedes')->group(function () {
    Route::get('/', [SedeController::class, 'index']);
    Route::post('/', [SedeController::class, 'store']);
    Route::get('/{id}', [SedeController::class, 'show']);
    Route::put('/{id}', [SedeController::class, 'update']);
    Route::delete('/{id}', [SedeController::class, 'destroy']);
});

Route::prefix('solicitudes')->group(function () {
    Route::get('/', [SolicitudController::class, 'index']);
    Route::post('/', [SolicitudController::class, 'store']);
    Route::get('/{id}', [SolicitudController::class, 'show']);
    Route::put('/{id}', [SolicitudController::class, 'update']);
    Route::delete('/{id}', [SolicitudController::class, 'destroy']);
});

Route::prefix('trazabilidad')->group(function () {
    Route::get('/', [TrazabilidadController::class, 'index']);
    Route::post('/', [TrazabilidadController::class, 'store']);
    Route::get('/{id}', [TrazabilidadController::class, 'show']);
    Route::put('/{id}', [TrazabilidadController::class, 'update']);
    Route::delete('/{id}', [TrazabilidadController::class, 'destroy']);
});

Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::post('/', [UsuarioController::class, 'store']);
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::put('/{id}', [UsuarioController::class, 'update']);
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
});

Route::prefix('usuario-bodega')->group(function () {
    Route::get('/', [UsuarioBodegaController::class, 'index']);
    Route::post('/', [UsuarioBodegaController::class, 'store']);
    Route::delete('/{id}', [UsuarioBodegaController::class, 'destroy']);
});

Route::prefix('usuario-ficha')->group(function () {
    Route::get('/', [UsuarioFichaController::class, 'index']);
    Route::post('/', [UsuarioFichaController::class, 'store']);
    Route::delete('/{id}', [UsuarioFichaController::class, 'destroy']);
});
