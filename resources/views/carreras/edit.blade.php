@extends('layouts.app')

@section('title', 'Editar Carrera')

@section('content')
    <h1>Editar Carrera</h1>
    <br>
    <a href="{{ route('carreras.index') }}" class="btn btn-secondary mb-3">← Volver</a>

    <form action="{{ route('carreras.update', $carrera) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" value="{{ old('nombre', $carrera->nombre) }}" class="form-control" style="max-width:400px;">
            @error('nombre') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Facultad:</label>
            <input type="text" name="facultad" value="{{ old('facultad', $carrera->facultad) }}" class="form-control" style="max-width:400px;">
            @error('facultad') <span class="text-danger">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
    </form>
@endsection