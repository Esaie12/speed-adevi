<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $statuses = [
            [
                'title' => 'En attente',
                'icon' => 'icon-waiting', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'warning', // Orange
            ],
            [
                'title' => 'En cours',
                'icon' => 'icon-in-progress', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'primary', // Bleu
            ],
            [
                'title' => 'Supendue',
                'icon' => 'icon-suspended', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'danger', // Rouge
            ],
            [
                'title' => 'Terminé',
                'icon' => 'icon-completed', // Remplacez par les icônes réelles que vous voulez utiliser
                'color' => 'success', // Vert
            ],
        ];

        foreach ($statuses as $status) {
            Status::create($status);
        }
    }
}
