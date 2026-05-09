@extends('layouts.app')

@section('title', 'Lista de Carreras')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Lista de Carreras</h1>
        <a href="{{ route('carreras.create') }}" class="btn btn-success">+ Nueva Carrera</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Facultad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($carreras as $carrera)
            <tr>
                <td>{{ $carrera->id }}</td>
                <td>{{ $carrera->nombre }}</td>
                <td>{{ $carrera->facultad }}</td>
                <td>
                    <a href="{{ route('carreras.edit', $carrera) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('carreras.destroy', $carrera) }}" method="POST" style="display:inline">
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