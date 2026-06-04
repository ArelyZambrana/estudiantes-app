@extends('layouts.app')

@section('title', 'Nueva Materia')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Nueva Materia</h1>
        <a href="{{ route('materias.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded font-medium transition-colors">← Volver</a>
    </div>

    <div style="background: rgba(0,0,0,0.5);" class="rounded-lg shadow p-6 max-w-lg border border-emerald-800">
        <form action="{{ route('materias.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre') }}" class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('nombre') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Horas:</label>
                <input type="number" name="creditos" value="{{ old('creditos') }}" class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('creditos') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Semestre:</label>
                <input type="text" name="semestre" value="{{ old('semestre') }}" placeholder="Ej: 1ro, 2do, 3ro..." class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('semestre') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Carrera:</label>
                <select name="carrera_id" class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">-- Selecciona una carrera --</option>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>
                            {{ $carrera->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('carrera_id') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-white px-6 py-2 rounded font-medium transition-colors">Guardar</button>
        </form>
    </div>
@endsection