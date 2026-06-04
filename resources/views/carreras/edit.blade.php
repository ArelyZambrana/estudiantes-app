@extends('layouts.app')

@section('title', 'Editar Carrera')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Editar Carrera</h1>
        <a href="{{ route('carreras.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">← Volver</a>
    </div>

    <div class="bg-white rounded shadow p-6 max-w-lg">
        <form action="{{ route('carreras.update', $carrera) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nombre:</label>
                <input type="text" name="nombre" value="{{ old('nombre', $carrera->nombre) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('nombre') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Facultad:</label>
                <input type="text" name="facultad" value="{{ old('facultad', $carrera->facultad) }}" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400">
                @error('facultad') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded">Actualizar</button>
        </form>
    </div>
@endsection