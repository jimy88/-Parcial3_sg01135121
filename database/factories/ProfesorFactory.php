<?php

namespace Database\Factories;

use App\Models\Profesor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProfesorFactory extends Factory
{
    protected $model = Profesor::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellido' => $this->faker->name,
			'dui' => $this->faker->name,
			'telefono' => $this->faker->name,
			'email' => $this->faker->name,
			'clave' => $this->faker->name,
        ];
    }
}
