<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\CD;
use App\Models\FYP;
use App\Models\Journal;
use App\Models\Newspapers;
use App\Models\AccessRequest;
use Carbon\Carbon;

class PustakawanController extends Controller
{
    public function __construct()
    {
        // Middleware memastikan pengguna login dan memiliki role pustakawan
        $this->middleware('auth');
    }

    

    public function index()
    {
        // Pastikan hanya pustakawan yang dapat mengakses
        if (auth()->user()->role !== 'pustakawan') {
            abort(403, 'Unauthorized');
        }

        // Cek pembaruan data dalam 3 bulan terakhir
        $threeMonthsAgo = Carbon::now()->subMonths(3);
        $recentBooks = Book::where('last_updated', '>=', $threeMonthsAgo)->count();
        $recentJournals = Journal::where('last_updated', '>=', $threeMonthsAgo)->count();
        $recentCds = CD::where('last_updated', '>=', $threeMonthsAgo)->count();
        $recentFyps = FYP::where('last_updated', '>=', $threeMonthsAgo)->count();
        $recentNewspapers = Newspapers::where('last_updated', '>=', $threeMonthsAgo)->count();

        // Ambil data buku dan permintaan akses
        $books = Book::all(); // Ambil semua data buku
        $requests = AccessRequest::all();

        return view('pustakawan_dashboard', compact(
            'recentBooks', 'recentJournals', 'recentCds', 'recentFyps', 'recentNewspapers', 'requests', 'books'
        ));
    }

    // Fungsi untuk menerima permintaan akses
    public function approveAccessRequest($id)
    {
        $accessRequest = AccessRequest::findOrFail($id);
        $accessRequest->status = 'approved';
        $accessRequest->updated_at = now();
        $accessRequest->save();

        return redirect()->route('pustakawan_dashboard')->with('success', 'Permintaan akses telah disetujui!');
    }

    // Fungsi untuk menolak permintaan akses
    public function rejectAccessRequest($id)
    {
        $accessRequest = AccessRequest::findOrFail($id);
        $accessRequest->status = 'rejected';
        $accessRequest->updated_at = now();
        $accessRequest->save();

        return redirect()->route('pustakawan_dashboard')->with('error', 'Permintaan akses telah ditolak!');
    }

    // Fungsi untuk menambah data buku
    public function addBook(Request $request)
    {
        $validated = $request->validate([
            'judulbuku' => 'required|string|max:255',
            'namapenerbit' => 'required|string|max:255',
            'jenisbuku' => 'required|string|max:255',
            'tahunterbit' => 'required|integer|between:1900,2023',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            // 'last_updated' => 'required|date_format:Y-m-d H:i:s',
        ]);
    
        // Menambah data buku baru ke database menggunakan create()
        Book::create([
            'judulbuku' => $validated['judulbuku'],
            'namapenerbit' => $validated['namapenerbit'],
            'jenisbuku' => $validated['jenisbuku'],
            'tahunterbit' => $validated['tahunterbit'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            // 'last_updated' => $validated['last_updated'],
        ]);
    
        // Redirect ke halaman dashboard pustakawan dengan pesan sukses
        return redirect()->route('pustakawan_dashboard')->with('success', 'Buku berhasil ditambahkan!');
    }
    

    // Fungsi untuk memperbarui data buku
    public function updateBook(Request $request, $id)
    {
        $validated = $request->validate([
            'judulbuku' => 'required|string|max:255',
            'namapenerbit' => 'required|string|max:255',
            'jenisbuku' => 'required|string|max:255',
            'tahunterbit' => 'required|integer|digits:4|between:1900,2100',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $book = Book::findOrFail($id);
        $book->update($validated);

        // Redirect ke halaman dashboard pustakawan dengan pesan sukses
        return redirect()->route('pustakawan_dashboard')->with('success', 'Buku berhasil diperbarui!');
    }
    // Fungsi untuk menambah data jurnal
    public function addJournal(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_at' => 'required|date',
        ]);

        Journal::create($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'Jurnal berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data jurnal
    public function updateJournal(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_at' => 'required|date',
        ]);

        $journal = Journal::findOrFail($id);
        $journal->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'Jurnal berhasil diperbarui!');
    }

    // Fungsi untuk menambah data FYP
    public function addFYP(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'submitted_at' => 'required|date',
        ]);

        FYP::create($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'FYP berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data FYP
    public function updateFYP(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'submitted_at' => 'required|date',
        ]);

        $fyp = FYP::findOrFail($id);
        $fyp->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'FYP berhasil diperbarui!');
    }

    // Fungsi untuk menambah data koran
    public function addNewspaper(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_at' => 'required|date',
        ]);

        Newspapers::create($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'Koran berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data koran
    public function updateNewspaper(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'published_at' => 'required|date',
        ]);

        $newspaper = Newspapers::findOrFail($id);
        $newspaper->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'Koran berhasil diperbarui!');
    }

    // Fungsi untuk menambah data CD
    public function addCD(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'released_at' => 'required|date',
        ]);

        CD::create($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'CD berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data CD
    public function updateCD(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'released_at' => 'required|date',
        ]);

        $cd = CD::findOrFail($id);
        $cd->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'CD berhasil diperbarui!');
    }
}
