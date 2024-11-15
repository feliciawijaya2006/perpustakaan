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
    // public function __construct()
    // {
    //     // Ensure the user is authenticated before accessing any methods
    //     $this->middleware('auth');
    // }

    public function __construct()
{
    $this->middleware('role:pustakawan');
}

    public function index()
    {
        // Check if the user has a role
        if (!session('role')) {
            // Redirect to login if role is not set
            return redirect()->route('login');
        }

        // Ambil semua data dari model
        $books = Book::paginate(10);
        $cds = CD::paginate(10);
        $fyps = FYP::paginate(10);
        $journals = Journal::paginate(10);
        $newspapers = Newspapers::paginate(10);

        // Kirim data ke view, including the user role
        return view('index', compact('books', 'cds', 'fyps', 'journals', 'newspapers'));
    }

    
}

