<?php

namespace Database\Seeders;

use App\Models\CD;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class CDSeeder extends Seeder
{
    public function run()
    {
        CD::factory(10)->create();
    }
}
