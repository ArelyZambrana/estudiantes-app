<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\EstudianteApiController;

// Ruta pública: login genera el token
Route::post('/login', [AuthController::class, 'login']);

// Rutas protegidas con Sanctum: requieren token válido
// Sin token → 401. Con token → 200
Route::middleware('auth:sanctum')->group(function () {

    // Logout: elimina el token
    Route::post('/logout', [AuthController::class, 'logout']);

    // API de estudiantes: retorna JSON
    Route::get('/estudiantes', [EstudianteApiController::class, 'index']);
    Route::get('/estudiantes/{estudiante}', [EstudianteApiController::class, 'show']);

});