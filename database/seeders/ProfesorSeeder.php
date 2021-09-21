<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        DB::table('profesors')->insert([
            'nombre' => 'juan',
            'apellido' => 'perez',
            'email' => 'juanperez45@gmail.com',
            'clave' => 'masculino',
        ]);

    }
}
