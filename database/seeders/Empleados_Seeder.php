<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class Empleados_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cargo = DB::table('cargos')->where(['nombre'=>'Instructor'])->value('id');

    Empleado::create([
        'nombre'=> 'Dony Cardenas',
        'email' => 'cardenasdonny@gmail.com',
        'direccion' => 'calle62B',
        'edad' => 36,
        'idCargo' => 1
    ]);
    Empleado::create([
        'nombre'=> 'Harrison Gallego',
        'email' => 'harrison@gmail.com',
        'direccion' => 'calle54D',
        'edad' => 18,
        'idCargo' => 2
    ]);
    Empleado::create([
        'nombre'=> 'Manuela cardona',
        'email' => 'ManuelaA@gmail.com',
        'direccion' => 'calle37A',
        'edad' => 23,
        'idCargo' => 3
    ]);

    Empleado::factory()->times(50)->create();
            
    }
}
