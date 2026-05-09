<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Scopes\EstudianteActivoScope;
use App\Observers\EstudianteObserver;

class Estudiante extends Model
{
    // Campos que se pueden llenar masivamente
    protected $fillable = ['nombre', 'apellido', 'codigo', 'carrera_id', 'activo'];

    /**
     * Aquí registramos tanto el Global Scope como el Observer.
     * booted() se ejecuta automáticamente cuando Laravel carga el modelo.
     */
    protected static function booted(): void
    {
        // Global Scope: filtra automáticamente solo estudiantes activos
        static::addGlobalScope(new EstudianteActivoScope());

        // Observer: detecta cambios y guarda historial automáticamente
        static::observe(EstudianteObserver::class);
    }

    // Un estudiante pertenece a una carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}