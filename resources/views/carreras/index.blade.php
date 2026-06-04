@extends('layouts.app')

@section('title', 'Lista de Carreras')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-white">Lista de Carreras</h1>
        <a href="{{ route('carreras.create') }}" class="bg-emerald-500 hover:bg-emerald-400 text-white px-4 py-2 rounded font-medium transition-colors">+ Nueva Carrera</a>
    </div>

    @if(session('success'))
        <div class="bg-emerald-500 text-white px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div style="background: rgba(0,0,0,0.5);" class="rounded-lg shadow overflow-hidden border border-emerald-800">
        <table class="w-full text-sm">
            <thead style="background: rgba(0,0,0,0.7);" class="text-emerald-300">
                <tr>
                    <th class="px-4 py-3 text-left">ID</th>
                    <th class="px-4 py-3 text-left">Nombre</th>
                    <th class="px-4 py-3 text-left">Facultad</th>
                    <th class="px-4 py-3 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carreras as $carrera)
                <tr class="border-b border-emerald-900 hover:bg-emerald-900 hover:bg-opacity-30 text-white">
                    <td class="px-4 py-3">{{ $carrera->id }}</td>
                    <td class="px-4 py-3">{{ $carrera->nombre }}</td>
                    <td class="px-4 py-3">{{ $carrera->facultad }}</td>
                    <td class="px-4 py-3 flex gap-2">
                        <a href="{{ route('carreras.edit', $carrera) }}" class="bg-emerald-600 hover:bg-emerald-500 text-white px-3 py-1 rounded text-xs">Editar</a>
                        <form action="{{ route('carreras.destroy', $carrera) }}" method="POST">
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
@endsection