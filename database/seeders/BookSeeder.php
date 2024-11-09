<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 10) as $index) {
            Book::create([
                'judulbuku' => $faker->sentence(3), // Judul buku dengan 3 kata
                'namapenerbit' => $faker->company,  // Nama penerbit menggunakan nama perusahaan palsu
                'tahunterbit' => $faker->year,      // Tahun terbit secara acak
                'harga' => $faker->numberBetween(50000, 200000), // Harga acak antara 50,000 dan 200,000
                'stok' => $faker->numberBetween(1, 100),         // Stok acak antara 1 dan 100
            ]);
            
        }
    }
}
