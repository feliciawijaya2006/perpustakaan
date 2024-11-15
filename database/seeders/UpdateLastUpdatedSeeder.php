<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Journal;
use App\Models\CD;
use App\Models\FYP;
use App\Models\Newspapers;
use Carbon\Carbon;

class UpdateLastUpdatedSeeder extends Seeder
{
    public function run()
    {
        $currentDate = Carbon::now();

        // Update last_updated untuk setiap tabel
        Book::query()->update(['last_updated' => $currentDate]);
        Journal::query()->update(['last_updated' => $currentDate]);
        CD::query()->update(['last_updated' => $currentDate]);
        FYP::query()->update(['last_updated' => $currentDate]);
        Newspapers::query()->update(['last_updated' => $currentDate]);

        $this->command->info('Kolom last_updated telah diisi dengan tanggal saat ini.');
    }
}

