<?php

namespace Database\Factories;

use App\Models\Alumno;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AlumnoFactory extends Factory
{
    protected $model = Alumno::class;

    public function definition()
    {
        return [
			'nombre' => $this->faker->name,
			'apellido' => $this->faker->name,
			'fechaDeNacimiento' => $this->faker->name,
			'direccion' => $this->faker->name,
			'genero' => $this->faker->name,
			'telefono' => $this->faker->name,
			'correo' => $this->faker->name,
			'clave' => $this->faker->name,
        ];
    }
}
