@extends('layouts.app')

@section('title', 'Lista de Estudiantes')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Lista de Estudiantes</h1>
        <a href="{{ route('estudiantes.create') }}" class="bg-emerald-500 hover:bg-emerald-400 text-white px-4 py-2 rounded font-medium transition-colors">+ Nuevo Estudiante</a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500 text-white px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('estudiantes.index') }}" class="mb-4 flex gap-2">
        <input type="text" name="buscar" value="{{ request('buscar') }}" placeholder="Buscar por nombre..." class="bg-gray-900 border border-emerald-700 rounded px-3 py-2 text-white w-64 focus:outline-none focus:ring-2 focus:ring-emerald-500">
        <button type="submit" class="bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2 rounded transition-colors">Buscar</button>
        <a href="{{ route('estudiantes.index') }}" class="bg-gray-700 hover:bg-gray-600 text-white px-4 py-2 rounded transition-colors">Limpiar</a>
    </form>

    <div style="background: rgba(0,0,0,0.5);" class="rounded-lg shadow overflow-hidden border border-emerald-800">
        <table class="w-full text-sm">
            <thead style="background: rgba(0,0,0,0.7);" class="text-emerald-300">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Apellido</th>
                    <th class="px-4 py-3 text-left">Codigo</th>
                    <th class="px-4 py-3 text-left">Carrera</th>
                    <th class="px-4 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                <tr class="border-b border-emerald-900 hover:bg-emerald-900 hover:bg-opacity-30 text-white">
                    <td class="px-4 py-3">{{ $estudiante->id }}</td>
                    <td class="px-4 py-3">{{ $estudiante->nombre }}</td>
                    <td class="px-4 py-3">{{ $estudiante->apellido }}</td>
                    <td class="px-4 py-3">{{ $estudiante->codigo }}</td>
                    <td class="px-4 py-3">{{ $estudiante->carrera->nombre }}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('estudiantes.show', $estudiante) }}" class="bg-blue-600 hover:bg-blue-500 text-white px-3 py-1 rounded text-xs">Ver</a>
                        <a href="{{ route('estudiantes.edit', $estudiante) }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-3 py-1 rounded text-xs">Editar</a>
                        <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-600 hover:bg-red-500 text-white px-3 py-1 rounded text-xs" onclick="return confirm('Eliminar?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4 text-white">
        {{ $estudiantes->appends(['buscar' => request('buscar')])->links() }}
    </div>
@endsection