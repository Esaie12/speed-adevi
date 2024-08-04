<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'title' => "Abonnement au cursus normal",
                'description' => "Abonnement au cursus normal",
                'picture' => 'path/to/technology.jpg',
                'slug' => slugify("Abonnement au cursus normal")
            ],
            [
                'title' => "Abonnement au cursus composé",
                'description' => "Abonnement par cursus",
                'picture' => 'path/to/health.jpg',
                'slug' => slugify("Abonnement au cursus composé"),
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
