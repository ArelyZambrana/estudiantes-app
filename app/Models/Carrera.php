<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = ['nombre', 'facultad'];

    // Una carrera tiene muchos estudiantes
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }

    // Una carrera tiene muchas materias
    public function materias()
    {
        return $this->hasMany(Materia::class);
    }
}