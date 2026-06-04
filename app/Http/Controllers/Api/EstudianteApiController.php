<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteApiController extends Controller
{
    /**
     * Retorna estudiantes en JSON con búsqueda y paginación.
     * Acepta ?search= para filtrar y ?page= para paginar.
     */
    public function index(Request $request)
    {
        $estudiantes = Estudiante::with('carrera')
            ->when($request->search, function ($query, $search) {
                $query->where('nombre', 'like', "%{$search}%")
                      ->orWhere('apellido', 'like', "%{$search}%");
            })
            ->paginate(5);

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