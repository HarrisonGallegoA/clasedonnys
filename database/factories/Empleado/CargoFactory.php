<?php

namespace Database\Factories\Empleado;

use App\Models\Empleado\Cargo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cargo>
 */
class CargoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cargo::class;
    public function definition()
    {
        return [
            'nombre'=>$this->faker->jobTitle
        ];
    }
}