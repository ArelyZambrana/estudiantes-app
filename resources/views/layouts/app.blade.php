<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App') — Sistema de Estudiantes</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">

    {{-- NAVBAR --}}
    <nav class="bg-gray-800 text-white px-6 py-4 flex justify-between items-center">
        <div class="flex gap-6">
            <a href="{{ route('materias.index') }}" class="hover:text-blue-300 font-semibold">📚 Materias</a>
            <a href="{{ route('carreras.index') }}" class="hover:text-blue-300 font-semibold">🎓 Carreras</a>
            <a href="{{ route('estudiantes.index') }}" class="hover:text-blue-300 font-semibold">👩‍🎓 Estudiantes</a>
        </div>
        <span class="text-gray-300 text-sm">Sistema de Estudiantes</span>
    </nav>

    {{-- CONTENIDO --}}
    <main class="max-w-5xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <p class="text-sm">Sistema de Gestión de Estudiantes 2026 — Laravel 11</p>
    </footer>

    @yield('scripts')

</body>
</html>