<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {

        DB::table('notas')->insert([
            'nota1' => 8,
            'nota2' => 8,
            'nota3' => 8,
            'nota4' => 8,
            'promedio' => 8,
        ]);

    }
}
