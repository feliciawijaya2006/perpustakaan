<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\CD;
use App\Models\FYP;
use App\Models\Journal;
use App\Models\Newspapers;

class PerpustakaanController extends Controller
{
    public function index()
    {
        // Ambil semua data dari model
        $books = Book::paginate(10);
        $cds = CD::paginate(10);
        $fyps = FYP::paginate(10);
        $journals = Journal::paginate(10);
        $newspapers = Newspapers::paginate(10);

        // Kirim data ke view
        return view('index', compact('books', 'cds', 'fyps', 'journals', 'newspapers'));
    }
}

