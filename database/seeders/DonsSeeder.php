<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dons;
use App\Models\DonsCollect;

class DonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dons::factory()
            ->count(10) // Nombre de dons à créer
            ->has(DonsCollect::factory()->count(3), 'transactions') // Chaque don a 3 collectes
            ->create();
    }
}
