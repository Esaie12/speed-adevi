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
            ['name' => 'CP', 'level' => 3],
            ['name' => 'CE1', 'level' => 4],
            ['name' => 'CE2', 'level' => 5],
            ['name' => 'CM1', 'level' => 6],
            ['name' => 'CM2', 'level' => 7],
            ['name' => '6ème', 'level' => 8],
            ['name' => '5ème', 'level' => 9],
            ['name' => '4ème', 'level' => 10],
            ['name' => '3ème', 'level' => 11],
            ['name' => 'Seconde', 'level' => 12],
            ['name' => 'Première', 'level' => 13],
            ['name' => 'Terminale', 'level' => 14],
        ];

        DB::table('classes')->insert($classes);
    }
}
