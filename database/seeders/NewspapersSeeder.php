<?php

namespace Database\Seeders;

use App\Models\Newspapers;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewspapersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Newspapers::factory(10)->create();
    }
}
