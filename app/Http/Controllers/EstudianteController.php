<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Carrera;
use App\Models\Scopes\EstudianteActivoScope;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Muestra la lista de estudiantes con búsqueda y paginación
    public function index(Request $request)
    {
        $estudiantes = Estudiante::with('carrera')
            ->when($request->buscar, function ($query, $buscar) {
                $query->where('nombre', 'like', "%{$buscar}%")
                      ->orWhere('apellido', 'like', "%{$buscar}%");
            })
            ->paginate(5);

        return view('estudiantes.index', compact('estudiantes'));
    }

    // Muestra el detalle de un estudiante individual
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }

    // Muestra el formulario para crear
    public function create()
    {
        $carreras = Carrera::all();
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