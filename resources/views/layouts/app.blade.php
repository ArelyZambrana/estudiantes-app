<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App') — Sistema de Estudiantes</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * { font-family: 'Poppins', sans-serif; }
        body { background: linear-gradient(135deg, #0f2027, #1a3a3a, #0d4f4f); min-height: 100vh; }
    </style>
</head>
<body>

    <nav style="background: rgba(0,0,0,0.7); backdrop-filter: blur(10px);" class="px-8 py-4 flex justify-between items-center shadow-lg border-b border-emerald-500">
        <div class="flex gap-8">
            <a href="{{ route('carreras.index') }}" class="text-emerald-300 hover:text-white font-medium transition-colors">Carreras</a>
            <a href="{{ route('estudiantes.index') }}" class="text-emerald-300 hover:text-white font-medium transition-colors">Estudiantes</a>
            <a href="{{ route('materias.index') }}" class="text-emerald-300 hover:text-white font-medium transition-colors">Materias</a>
        </div>
        <span class="text-white font-semibold text-sm tracking-widest">SISTEMA DE ESTUDIANTES</span>
    </nav>

    <main class="max-w-5xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer style="background: rgba(0,0,0,0.7);" class="text-center py-4 mt-10 border-t border-emerald-500">
        <p class="text-sm text-emerald-300">Sistema de Gestión de Estudiantes 2026 — Laravel 11</p>
    </footer>

    @yield('scripts')

</body>
</html>