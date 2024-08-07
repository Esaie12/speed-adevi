<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Plateforme;

class PlateformeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Plateforme::create([
            'mode'=> 1,
            "public_key" => '85abcb60ae8311ecb9755de712bc9e4f',
            "private_key" => 'tpk_85abf271ae8311ecb9755de712bc9e4f',
            'secret_key' => 'tsk_85abf272ae8311ecb9755de712bc9e4f',
        ]);
    }
}
