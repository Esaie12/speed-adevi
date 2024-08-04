<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrancheStatus;

class TrancheStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = [
            [
                'title' => 'En attente de livraison',
                'icon' => 'icon-pending', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'warning', // Orange
            ],

            [
                'title' => 'Livraison effectuée',
                'icon' => 'icon-completed', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'success', // Vert
            ],
            [
                'title' => 'En retard',
                'icon' => 'icon-suspended', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'danger', // Rouge
            ],
            [
                'title' => 'Annuler',
                'icon' => 'icon-suspended', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'danger', // Rouge
            ],
        ];

        foreach ($statuses as $status) {
            TrancheStatus::create($status);
        }
    }
}
