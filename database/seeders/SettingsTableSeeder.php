<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('settings')->insert([
            [
                'key' => 'Logo',
                'logo' => 'logo.png',
                'adresse' => null,
                'email' => null,
                'tel1' => null,
                'tel2' => null,
                'value' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'Adresse',
                'logo' => null,
                'adresse' => 'Malabo, Guinée équatoriale',
                'email' => null,
                'tel1' => null,
                'tel2' => null,
                'value' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'Email',
                'logo' => null,
                'adresse' => null,
                'email' => 'contact@segui-group.com',
                'tel1' => null,
                'tel2' => null,
                'value' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'Téléphone1',
                'logo' => null,
                'adresse' => null,
                'email' => null,
                'tel1' => '+240 222864181',
                'tel2' => null,
                'value' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'key' => 'Téléphone2',
                'logo' => null,
                'adresse' => null,
                'email' => null,
                'tel1' => null,
                'tel2' => '+221 778302877',
                'value' => null,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
