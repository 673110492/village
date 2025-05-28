<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Principal',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('admin'), // change ce mot de passe !
            'phone' => '+240 123456789',
            'address' => 'Malabo, Guinée équatoriale',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
