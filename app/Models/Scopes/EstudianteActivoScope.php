<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class EstudianteActivoScope implements Scope
{
    /**
     * Global Scope: se aplica automáticamente a TODOS los SELECT de Estudiante.
     * Filtra solo los estudiantes activos (activo = 1).
     * El controlador no necesita saber de este filtro, es invisible.
     */
    public function apply(Builder $builder, Model $model): void
    {
        // Solo retorna estudiantes donde activo = 1
        $builder->where('activo', 1);
    }
}