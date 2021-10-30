<?php

namespace Database\Factories;

use App\Models\Nota;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NotaFactory extends Factory
{
    protected $model = Nota::class;

    public function definition()
    {
        return [
			'nota1' => $this->faker->name,
			'nota2' => $this->faker->name,
			'nota3' => $this->faker->name,
			'nota4' => $this->faker->name,
			'promedio' => $this->faker->name,
			'parcial' => $this->faker->name,
			'alumno_id' => $this->faker->name,
			'curso_id' => $this->faker->name,
			'profesor_id' => $this->faker->name,
        ];
    }
}
