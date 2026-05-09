<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nueva Carrera</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        input { padding: 8px; width: 300px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 4px; }
        .btn { padding: 8px 16px; border-radius: 4px; border: none; cursor: pointer; }
        .btn-green { background: #28a745; color: white; }
        .error { color: red; font-size: 13px; }
    </style>
</head>
<body>
    <h1>Nueva Carrera</h1>
    <a href="{{ route('carreras.index') }}">← Volver</a>
    <br><br>

    <form action="{{ route('carreras.store') }}" method="POST">
        @csrf

        <label>Nombre:</label><br>
        <input type="text" name="nombre" value="{{ old('nombre') }}">
        @error('nombre') <span class="error">{{ $message }}</span> @enderror
        <br>

        <label>Facultad:</label><br>
        <input type="text" name="facultad" value="{{ old('facultad') }}">
        @error('facultad') <span class="error">{{ $message }}</span> @enderror
        <br>

        <button type="submit" class="btn btn-green">Guardar</button>
    </form>
</body>
</html>