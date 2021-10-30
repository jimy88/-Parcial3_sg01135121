<?php

namespace Database\Factories;

use App\Models\Curso;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CursoFactory extends Factory
{
    protected $model = Curso::class;

    public function definition()
    {
        return [
			'nombrecurso' => $this->faker->name,
			'año' => $this->faker->name,
			'ciclo' => $this->faker->name,
			'profesor_id' => $this->faker->name,
        ];
    }
}
