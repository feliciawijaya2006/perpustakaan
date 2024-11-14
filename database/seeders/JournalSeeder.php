<?php

namespace Database\Seeders;

use App\Models\Journal;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;

class JournalSeeder extends Seeder
{
    public function run()
    {
        Journal::factory(10)->create();
    }
}

