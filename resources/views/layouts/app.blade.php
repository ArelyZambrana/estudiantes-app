<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mi App') — Sistema de Estudiantes</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>

    {{-- NAVBAR: igual en todas las páginas --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/">🎓 Sistema de Estudiantes</a>
            <div class="navbar-nav">
                <a class="nav-link" href="{{ route('carreras.index') }}">Carreras</a>
                <a class="nav-link" href="{{ route('estudiantes.index') }}">Estudiantes</a>
            </div>
        </div>
    </nav>

    {{-- CONTENIDO: aquí Laravel inserta el @section('content') de la vista hija --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    {{-- FOOTER: igual en todas las páginas --}}
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p class="mb-0">Sistema de Gestión de Estudiantes 2026 — Laravel 11</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    {{-- Espacio para JS específico de cada vista --}}
    @yield('scripts')

</body>
</html>