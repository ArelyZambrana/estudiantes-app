<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class RegistrarAuditoria
{
    /**
     * Intercepta cada request y guarda los datos en la tabla auditorias.
     * Esto es un Middleware: se ejecuta ANTES de que llegue al controlador.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Guardamos el registro de auditoría en la base de datos
        DB::table('auditorias')->insert([
            'ip'          => $request->ip(),                          // IP del cliente
            'url'         => $request->fullUrl(),                     // URL completa accedida
            'metodo'      => $request->method(),                      // GET, POST, PUT, DELETE
            'usuario_id'  => auth()->check() ? auth()->id() : null,  // ID usuario o null
            'created_at'  => now(),
            'updated_at'  => now(),
        ]);

        // Continuamos con el request normal
        return $next($request);
    }
}