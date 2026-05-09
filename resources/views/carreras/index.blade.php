<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Carreras</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; text-align: left; }
        th { background: #4a90d9; color: white; }
        a { color: #4a90d9; text-decoration: none; }
        .btn { padding: 6px 12px; border-radius: 4px; border: none; cursor: pointer; }
        .btn-green { background: #28a745; color: white; }
        .btn-red { background: #dc3545; color: white; }
        .alert { padding: 10px; background: #d4edda; color: #155724; margin-bottom: 15px; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Lista de Carreras</h1>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <a href="{{ route('carreras.create') }}" class="btn btn-green">+ Nueva Carrera</a>
    <a href="{{ route('estudiantes.index') }}" style="margin-left:15px">Ver Estudiantes</a>

    <br><br>

    <table>
        <thead>
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
                    <a href="{{ route('carreras.edit', $carrera) }}" class="btn btn-green">Editar</a>
                    <form action="{{ route('carreras.destroy', $carrera) }}" method="POST" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red" onclick="return confirm('¿Eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>