<?php

namespace Database\Seeders;

use App\Models\PrestamoHistorico;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestamo;
use App\Models\Usuario;

class PrestamoHistoricoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $prestamos = Prestamo::all();

        $prestamos->each(function ($prestamo) {
            $prestamoHistorico = new PrestamoHistorico([
                'prestamo_id' => $prestamo->id,
                'aula_id' => $prestamo->aula_id,
                'user_id' => $prestamo->user_id,
                'asignatura_id' => $prestamo->asignatura_id,
                'motivo' => $prestamo->motivo,
                'fecha_prestamo' => $prestamo->fecha_prestamo,
                'hora_inicio' => $prestamo->hora_inicio,
                'hora_fin' => $prestamo->hora_fin,
                'ultimate_state' => 'Creado',
            ]);

            $prestamoHistorico->save();
            $equipos = $prestamo->inventario;

            $inventarioConDatos = [];
            foreach ($equipos as $inventa) {
                $inventarioConDatos[$inventa->id] = [
                    'estado' => $inventa->estado,
                    'identificador' => $inventa->identificador,
                ];
            }

            $prestamoHistorico->inventario()->attach($inventarioConDatos);
        });
    }

}
