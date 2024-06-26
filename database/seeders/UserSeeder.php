<?php

namespace Database\Seeders;

use App\Models\Carrera;
use App\Models\Departamento;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = Departamento::all();
        $carreras = Carrera::all();

        User::factory()->count(150)
            ->create()
            ->each(function ($user) use ($departamentos, $carreras) {
                $user->departamento_id = $departamentos->random()->id;
                $user->carrera_id = $carreras->random()->id;
                $user->save();
            });
    }
}
