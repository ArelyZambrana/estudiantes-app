<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    // Campos que se pueden llenar masivamente
    protected $fillable = ['nombre', 'facultad'];

    // Una carrera tiene muchos estudiantes
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class);
    }
}