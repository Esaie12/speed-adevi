<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            ['name' => 'Maternelle 1', 'level' => 1],
            ['name' => 'Maternelle 2', 'level' => 2],
            ['name' => 'CI', 'level' => 3], // Ajout de la classe CI ici
            ['name' => 'CP', 'level' => 4],
            ['name' => 'CE1', 'level' => 5],
            ['name' => 'CE2', 'level' => 6],
            ['name' => 'CM1', 'level' => 7],
            ['name' => 'CM2', 'level' => 8],
            ['name' => '6ème', 'level' => 9],
            ['name' => '5ème', 'level' => 10],
            ['name' => '4ème', 'level' => 11],
            ['name' => '3ème', 'level' => 12],
            ['name' => 'Seconde', 'level' => 13],
            ['name' => 'Première', 'level' => 14],
            ['name' => 'Terminale', 'level' => 15],
        ];

        DB::table('classes')->insert($classes);
    }
}
