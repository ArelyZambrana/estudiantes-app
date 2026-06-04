<?php
use App\Http\Controllers\MateriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarreraController;
use App\Http\Controllers\EstudianteController;

// Ruta principal redirige a carreras
Route::get('/', function () {
    return redirect()->route('carreras.index');
});

// Rutas protegidas con middleware de auditoría
Route::middleware(['App\Http\Middleware\RegistrarAuditoria'])->group(function () {

    // Rutas CRUD para Carreras
    Route::resource('carreras', CarreraController::class);

    // Rutas CRUD para Estudiantes
    Route::resource('estudiantes', EstudianteController::class);
    Route::resource('materias', MateriaController::class);
});