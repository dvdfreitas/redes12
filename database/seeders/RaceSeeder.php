<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('races')->insert([
            'name' => 'Corrida de São João',
            'local' => 'Porto',
            'date' => '2025-06-24',
            'distance' => 10            
        ]);
    }
}
