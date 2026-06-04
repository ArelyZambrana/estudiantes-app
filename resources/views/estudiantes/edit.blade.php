@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Editar Estudiante</h1>
        <a href="{{ route('estudiantes.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded font-medium transition-colors">← Volver</a>
    </div>

    <div style="background: rgba(0,0,0,0.5);" class="rounded-lg shadow p-6 max-w-lg border border-emerald-800">
        <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('nombre') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Apellido:</label>
                <input type="text" name="apellido" value="{{ old('apellido', $estudiante->apellido) }}" class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('apellido') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Codigo:</label>
                <input type="text" name="codigo" value="{{ old('codigo', $estudiante->codigo) }}" class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                @error('codigo') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-emerald-300 mb-1">Carrera:</label>
                <select name="carrera_id" class="w-full bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white focus:outline-none focus:ring-2 focus:ring-emerald-500">
                    <option value="">-- Selecciona una carrera --</option>
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera->id }}" {{ old('carrera_id', $estudiante->carrera_id) == $carrera->id ? 'selected' : '' }}>
                            {{ $carrera->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('carrera_id') <span class="text-red-400 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-emerald-500 hover:bg-emerald-400 text-white px-6 py-2 rounded font-medium transition-colors">Actualizar</button>
        </form>
    </div>
@endsection