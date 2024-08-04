<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CursusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cursus = [
            [
                'category_id' => 1,
                'title' => "Maternelle 1 au CM2",
                //'slug' => Str::slug('Cursus Technology') . '-' . Str::random(6),
                'nombre_year' => 8,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 6250,
                'montant_inscription' => 5000,
                'montant_cursus' => 200000,
                'classes' => json_encode([1, 2, 3, 4, 5, 6, 7,8]),
            ],
            [
                'category_id' => 1,
                'title' => "6eme en 3eme",
                //'slug' => Str::slug('Cursus Health') . '-' . Str::random(6),
                'nombre_year' => 4,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 15000,
                'montant_inscription' => 5000,
                'montant_cursus' => 240000,
                'classes' => json_encode([8, 9, 10, 11]),
            ],
            [
                'category_id' => 1,
                'title' => "2nde en Terminale",
                //'slug' => Str::slug('Cursus Lifestyle') . '-' . Str::random(6),
                'nombre_year' => 3,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 15000,
                'montant_inscription' => 5000,
                'montant_cursus' => 180000,
                'classes' => json_encode([12, 13, 14]),
            ],
            [
                'category_id' => 2,
                'title' => "6eme en Terminale",
                //'slug' => Str::slug('Cursus Education') . '-' . Str::random(6),
                'nombre_year' => 7,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 15000,
                'montant_inscription' => 5000,
                'montant_cursus' => 420000,
                'classes' => json_encode([8, 9, 10, 11, 12, 13, 14]),
            ],
            [
                'category_id' => 2,
                'title' => "CP en 3ème",
                //'slug' => Str::slug('Cursus Business') . '-' . Str::random(6),
                'nombre_year' => 10,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 9625,
                'montant_inscription' => 10000,
                'montant_cursus' => 390000,
                'classes' => json_encode([3, 4, 5, 6, 7, 8, 9, 10, 11]),
            ],
            [
                'category_id' => 2,
                'title' => "Maternelle 1 en 3ème",
                //'slug' => Str::slug('Cursus Business') . '-' . Str::random(6),
                'nombre_year' => 12,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 9000,
                'montant_inscription' => 13000,
                'montant_cursus' => 440000,
                'classes' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]),
            ],
            [
                'category_id' => 2,
                'title' => "CP en Terminale",
                //'slug' => Str::slug('Cursus Business') . '-' . Str::random(6),
                'nombre_year' => 13,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 10950,
                'montant_inscription' => 5600,
                'montant_cursus' => 570000,
                'classes' => json_encode([3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]),
            ],
            [
                'category_id' => 2,
                'title' => "Maternelle en Terminale",
                //'slug' => Str::slug('Cursus Business') . '-' . Str::random(6),
                'nombre_year' => 15,
                'duree_mensuelle' => 4,
                'forfait_mensuel' => 10000,
                'montant_inscription' => 10250,
                'montant_cursus' => 620000,
                'classes' => json_encode([1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]),
            ],
        ];

        DB::table('cursus')->insert($cursus);
    }

}
