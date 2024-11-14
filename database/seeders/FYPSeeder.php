<?php

namespace Database\Seeders;

use App\Models\FYP;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class FYPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FYP::factory(10)->create();
    }
}
