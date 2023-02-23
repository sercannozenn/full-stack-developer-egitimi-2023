<?php

namespace Database\Seeders;

use App\Models\Hastaliklar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HastaliklarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hastaliklar::factory(10)->create();
    }
}
