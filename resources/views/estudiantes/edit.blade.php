@extends('layouts.app')

@section('title', 'Editar Estudiante')

@section('content')
    <h1>Editar Estudiante</h1>
    <br>
    <a href="{{ route('estudiantes.index') }}" class="btn btn-secondary mb-3">← Volver</a>

    <form action="{{ route('estudiantes.update', $estudiante) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $estudiante->nombre) }}" class="form-control" style="max-width:400px;">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Apellido:</label>
            <input type="text" name="apellido" value="{{ old('apellido', $estudiante->apellido) }}" class="form-control" style="max-width:400px;">
            @error('apellido') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Código:</label>
            <input type="text" name="codigo" value="{{ old('codigo', $estudiante->codigo) }}" class="form-control" style="max-width:400px;">
            @error('codigo') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Carrera:</label>
            <select name="carrera_id" class="form-select" style="max-width:400px;">
                <option value="">-- Selecciona una carrera --</option>
                @foreach($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ old('carrera_id', $estudiante->carrera_id) == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->nombre }}
                    </option>
                @endforeach
            </select>
            @error('carrera_id') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection