<?php

namespace Database\Seeders;

use App\Models\Empleado\Cargo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Cargos_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Cargo::create([
            'nombre'=> 'Instructor',
        ]);

        Cargo::create([
            'nombre'=> 'Director',
        ]);

        Cargo::create([
            'nombre'=> 'Coordinador',
        ]);

        Cargo::factory()->times(10)->create();

    }
}