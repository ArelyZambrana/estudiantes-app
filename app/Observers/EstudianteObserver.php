<?php

namespace App\Observers;

use App\Models\Estudiante;
use Illuminate\Support\Facades\DB;

class EstudianteObserver
{
    /**
     * Observer: se ejecuta automáticamente ANTES de que se guarde una actualización.
     * Detecta qué campos cambiaron y los guarda en historial_estudiantes.
     */
    public function updating(Estudiante $estudiante): void
    {
        // getDirty() retorna los campos que cambiaron con sus nuevos valores
        $camposCambiados = $estudiante->getDirty();

        // getOriginal() retorna los valores originales antes del cambio
        foreach ($camposCambiados as $campo => $valorNuevo) {
            $valorAnterior = $estudiante->getOriginal($campo);

            // Guardamos cada campo que cambió en la tabla historial
            DB::table('historial_estudiantes')->insert([
                'estudiante_id' => $estudiante->id,
                'campo'         => $campo,
                'valor_anterior'=> $valorAnterior,
                'valor_nuevo'   => $valorNuevo,
                'created_at'    => now(),
                'updated_at'    => now(),
            ]);
        }
    }
}