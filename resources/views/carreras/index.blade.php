@extends('layouts.app')

@section('title', 'Lista de Carreras')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Carreras</h1>
        <a href="{{ route('carreras.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">+ Nueva Carrera</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Facultad</th>
                    <th class="px-4 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carreras as $carrera)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $carrera->id }}</td>
                    <td class="px-4 py-3">{{ $carrera->nombre }}</td>
                    <td class="px-4 py-3">{{ $carrera->facultad }}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('carreras.edit', $carrera) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Editar</a>
                        <form action="{{ route('carreras.destroy', $carrera) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection