<?php

namespace App\Http\Controllers;

use App\Models\Materia;
use App\Models\Carrera;
use Illuminate\Http\Request;

class MateriaController extends Controller
{
    public function index(Request $request)
    {
        $materias = Materia::with('carrera')
            ->when($request->buscar, function ($query, $buscar) {
                $query->where('nombre', 'like', "%{$buscar}%");
            })
            ->paginate(5);

        return view('materias.index', compact('materias'));
    }

    public function create()
    {
        $carreras = Carrera::all();
        return view('materias.create', compact('carreras'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'creditos'   => 'required|integer|min:1',
            'semestre'   => 'required|string|max:50',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        Materia::create($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente');
    }

    public function edit(Materia $materia)
    {
        $carreras = Carrera::all();
        return view('materias.edit', compact('materia', 'carreras'));
    }

    public function update(Request $request, Materia $materia)
    {
        $request->validate([
            'nombre'     => 'required|string|max:255',
            'creditos'   => 'required|integer|min:1',
            'semestre'   => 'required|string|max:50',
            'carrera_id' => 'required|exists:carreras,id',
        ]);

        $materia->update($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente');
    }

    public function destroy(Materia $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente');
    }
}