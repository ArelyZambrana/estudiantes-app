@extends('layouts.app')

@section('title', 'Lista de Estudiantes')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Estudiantes</h1>
        <a href="{{ route('estudiantes.create') }}" class="btn btn-success">+ Nuevo Estudiante</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Código</th>
                <th>Carrera</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiantes as $estudiante)
            <tr>
                <td>{{ $estudiante->id }}</td>
                <td>{{ $estudiante->nombre }}</td>
                <td>{{ $estudiante->apellido }}</td>
                <td>{{ $estudiante->codigo }}</td>
                <td>{{ $estudiante->carrera->nombre }}</td>
                <td>
                    <a href="{{ route('estudiantes.edit', $estudiante) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('estudiantes.destroy', $estudiante) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection