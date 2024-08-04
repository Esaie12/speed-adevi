<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'account_id'=> "AD".(User::count()+1).date('Y'),
            'role'=>'admin',
            'firstname' => "APEDI",
            'lastname' => "Admin",
            'email' => "admin@gmail.com",
            'password' => Hash::make("P@ssw0rd"),
        ]);
    }
}
