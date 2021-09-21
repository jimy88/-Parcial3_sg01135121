<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlumnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('alumnos')->insert([
                'nombre' => 'jimy',
                'apellido' => 'ronal',
                'fechaDeNacimiento' => '1999-07-16',
                'direccion' => 'col brisas del sur santo tomas',
                'genero' => 'masculino',
                'telefono' => 76897856,
                'correo' => 'jimyrts@gmail.com',
                'clave' => '23456',
        ]);
        
        
    }
}
