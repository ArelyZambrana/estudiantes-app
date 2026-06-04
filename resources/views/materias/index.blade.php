@extends('layouts.app')

@section('title', 'Lista de Materias')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Materias</h1>
        <a href="{{ route('materias.create') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">+ Nueva Materia</a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    {{-- Búsqueda --}}
    <form method="GET" action="{{ route('materias.index') }}" class="mb-4 flex gap-2">
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar por nombre..." class="border border-gray-300 rounded px-3 py-2 w-64 focus:outline-none focus:ring-2 focus:ring-blue-400">
        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Buscar</button>
        <a href="{{ route('materias.index') }}" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded">Limpiar</a>
    </form>

    <div class="bg-white rounded shadow overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Créditos</th>
                    <th class="px-4 py-3 text-left">Semestre</th>
                    <th class="px-4 py-3 text-left">Carrera</th>
                    <th class="px-4 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materias as $materia)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $materia->id }}</td>
                    <td class="px-4 py-3">{{ $materia->nombre }}</td>
                    <td class="px-4 py-3">{{ $materia->creditos }}</td>
                    <td class="px-4 py-3">{{ $materia->semestre }}</td>
                    <td class="px-4 py-3">{{ $materia->carrera->nombre }}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('materias.edit', $materia) }}" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Editar</a>
                        <form action="{{ route('materias.destroy', $materia) }}" method="POST">
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

    {{-- Paginación --}}
    <div class="mt-4">
        {{ $materias->appends(['buscar' => request('buscar')])->links() }}
    </div>
@endsection