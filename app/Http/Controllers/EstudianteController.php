<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Scopes\EstudianteActivoScope;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Muestra la lista de estudiantes con su carrera relacionada
    public function index()
    {
        // Caso especial: si el usuario es administrador, muestra TODOS los registros
        // incluidos los inactivos, saltando el Global Scope explícitamente
        if (auth()->check() && auth()->user()->role === 'admin') {
            $estudiantes = Estudiante::withoutGlobalScope(EstudianteActivoScope::class)
                                 ->with('carrera')
                                 ->get();
        } else {
            // Usuario normal: el Global Scope filtra automáticamente activo = 1
            $estudiantes = Estudiante::with('carrera')->get();
    }
        return view('estudiantes.index', compact('estudiantes'));
    }

    // Muestra el formulario para crear
    public function create()
    {
        $carreras = Carrera::all(); // Necesitamos las carreras para el select
        return view('estudiantes.create', compact('carreras'));
    }

    // Guarda el nuevo estudiante
    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'apellido'   => 'required|string|max:255',
            'codigo'     => 'required|string|unique:estudiantes',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        Estudiante::create($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante creado correctamente');
    }

    // Muestra el formulario para editar
    public function edit(Estudiante $estudiante)
    {
        $carreras = Carrera::all();
        return view('estudiantes.edit', compact('estudiante', 'carreras'));
    }

    // Actualiza el estudiante
    public function update(Request $request, Estudiante $estudiante)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'apellido'   => 'required|string|max:255',
            'codigo'     => 'required|string|unique:estudiantes,codigo,'.$estudiante->id,
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $estudiante->update($request->all());
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante actualizado correctamente');
    }

    // Elimina el estudiante
    public function destroy(Estudiante $estudiante)
    {
        $estudiante->delete();
        return redirect()->route('estudiantes.index')->with('success', 'Estudiante eliminado correctamente');
    }
}