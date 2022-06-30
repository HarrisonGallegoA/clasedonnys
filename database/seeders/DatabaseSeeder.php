<?php

namespace Database\Seeders;

use App\Models\Empleado\Cargo;
use Illuminate\Database\Seeder;
use App\Models\Empleado\Empleado;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Cargos_Seeder;
use Database\Seeders\Empleados_Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // se eliminan las llaves 
        Cargo::truncate();
        Empleado::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
        $this->call(Cargos_Seeder::class);
        $this->call(Empleados_Seeder::class);
    }    
}


