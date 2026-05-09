<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Estudiante</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        input, select { padding: 8px; width: 300px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        .btn { padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer; }
        .btn-green { background: #28a745; color: white; }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>
    <h1>Nuevo Estudiante</h1>
    <a href="{{ route('estudiantes.index') }}">← Volver</a>
    <br><br>

    <form action="{{ route('estudiantes.store') }}" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Apellido:</label><br>
        <input type="text" name="apellido" value="{{ old('apellido') }}">
        @error('apellido') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Código:</label><br>
        <input type="text" name="codigo" value="{{ old('codigo') }}">
        @error('codigo') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Carrera:</label><br>
        <select name="carrera_id">
            <option value="">-- Selecciona una carrera --</option>
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->id }}" {{ old('carrera_id') == $carrera->id ? 'selected' : '' }}>
                    {{ $carrera->nombre }}
                </option>
            @endforeach
        </select>
        @error('carrera_id') <span class="error">{{ $message }}</span> @enderror
        <br>

        <button type="submit" class="btn btn-green">Guardar</button>
    </form>
</body>
</html>