<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use Illuminate\Http\Request;

class CarreraController extends Controller
{
    // Muestra la lista de carreras
    public function index()
    {
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras'));
    }

    // Muestra el formulario para crear
    public function create()
    {
        return view('carreras.create');
    }

    // Guarda la nueva carrera
    public function store(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'facultad' => 'required|string|max:255',
        ]);

        Carrera::create($request->all());
        return redirect()->route('carreras.index')->with('success', 'Carrera creada correctamente');
    }

    // Muestra el formulario para editar
    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }

    // Actualiza la carrera
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'facultad' => 'required|string|max:255',
        ]);

        $carrera->update($request->all());
        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada correctamente');
    }

    // Elimina la carrera
    public function destroy(Carrera $carrera)
    {
        $carrera->delete();
        return redirect()->route('carreras.index')->with('success', 'Carrera eliminada correctamente');
    }
}