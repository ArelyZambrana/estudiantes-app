<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use App\Models\Scopes\EstudianteActivoScope;
use Illuminate\Http\Request;

class EstudianteApiController extends Controller
{
    /**
     * Retorna todos los estudiantes en formato JSON.
     * A diferencia del controlador Blade, este no devuelve vistas sino JSON.
     */
    public function index()
    {
        $estudiantes = Estudiante::with('carrera')->get();
        return response()->json($estudiantes);
    }

    /**
     * Retorna un estudiante específico en formato JSON.
     */
    public function show(Estudiante $estudiante)
    {
        return response()->json($estudiante->load('carrera'));
    }
}