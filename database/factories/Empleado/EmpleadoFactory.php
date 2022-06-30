<?php

namespace Database\Factories\Empleado;

use App\Models\Empleado\Empleado;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Empleado::class;
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name,
            'direccion'=>$this->faker->streetAddress,
            'edad'=>$this->faker->numberBetween($min = 18, $max = 110),
            'email'=>$this->faker->unique()->safeEmail,
            'idCargo'=>$this->faker->numberBetween($min = 1, $max = 13)

        ];
    }
}