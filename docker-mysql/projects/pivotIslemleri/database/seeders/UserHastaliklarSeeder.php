<?php

namespace Database\Seeders;

use App\Models\UserHastaliklar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserHastaliklarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i= 0; $i<20; $i++)
        {
            $randomUserId = random_int(1,10);
            $randomHastalikId = random_int(1,10);

            UserHastaliklar::create([
                'user_id' => $randomUserId,
                'hastalik_id' => $randomHastalikId
            ]);
        }
    }
}
