<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
class BookSeeder extends Seeder
{
    public function run()
    {
        Book::factory(10)->create();
    }
}
