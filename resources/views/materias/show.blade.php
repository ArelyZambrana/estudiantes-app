@extends('layouts.app')

@section('title', 'Detalle de Materia')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Detalle de Materia</h1>
        <a href="{{ route('materias.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded font-medium transition-colors">← Volver</a>
    </div>

    <div style="background: rgba(0,0,0,0.5);" class="rounded-lg shadow p-6 max-w-lg border border-emerald-800">
        <div class="mb-4">
            <span class="text-emerald-300 text-sm font-medium">ID:</span>
            <p class="text-white text-lg">{{ $materia->id }}</p>
        </div>
        <div class="mb-4">
            <span class="text-emerald-300 text-sm font-medium">Nombre:</span>
            <p class="text-white text-lg">{{ $materia->nombre }}</p>
        </div>
        <div class="mb-4">
            <span class="text-emerald-300 text-sm font-medium">Horas:</span>
            <p class="text-white text-lg">{{ $materia->creditos }}</p>
        </div>
        <div class="mb-4">
            <span class="text-emerald-300 text-sm font-medium">Semestre:</span>
            <p class="text-white text-lg">{{ $materia->semestre }}</p>
        </div>
        <div class="mb-4">
            <span class="text-emerald-300 text-sm font-medium">Carrera:</span>
            <p class="text-white text-lg">{{ $materia->carrera->nombre }}</p>
        </div>
        <div class="flex gap-2 mt-6">
            <a href="{{ route('materias.edit', $materia) }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2 rounded transition-colors">Editar</a>
            <form action="{{ route('materias.destroy', $materia) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red-600 hover:bg-red-500 text-white px-4 py-2 rounded transition-colors" onclick="return confirm('Eliminar?')">Eliminar</button>
            </form>
        </div>
    </div>
@endsection