<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HotelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('hoteles')->insert([
            'name' => 'Akumal',
        ]);

        DB::table('hoteles')->insert([
            'name' => 'Coba',
        ]);

        DB::table('hoteles')->insert([
            'name' => 'Sian Ka´an',
        ]);

        DB::table('hoteles')->insert([
            'name' => 'Tulum',
        ]);
    }
}
