<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('images')->insert([
            'name' => 'Porto',
            'path' => 'fcp.png'
        ]);

        DB::table('images')->insert([
            'name' => 'Gondomar',
            'path' => 'gondomar.jpg'
        ]);

    }
}
