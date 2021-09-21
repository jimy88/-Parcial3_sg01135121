<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cursos')->insert([
            'nombrecurso' => 'programacion dos',
            'año' => '1999-07-16',
            'ciclo' => 'dos',
            'profesor_id' => '1',
    ]);




    }
}
