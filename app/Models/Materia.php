<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $fillable = ['nombre', 'creditos', 'semestre', 'carrera_id'];

    // Una materia pertenece a una carrera
    public function carrera()
    {
        return $this->belongsTo(Carrera::class);
    }
}