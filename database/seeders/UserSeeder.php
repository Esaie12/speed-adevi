<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Cursus;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(5)->administrateur()->create();

        User::factory()->count(25)->customer()->create()->each(function ($user, $index){


            $id_cursus = random_int(1 , Cursus::count());
           // $id_cursus = random_int(1 , 4);

            app('App\Http\Controllers\SeederController')->payments( $user->id ,$id_cursus , random_int(0,1) );
            return $user;
        });
    }
}
