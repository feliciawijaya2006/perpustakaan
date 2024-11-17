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
        $journals = Journal::all(); 
        $cds = CD::all(); 
        $fyps = FYP::all(); 
        $newspapers = Newspapers::all(); 
        $requests = AccessRequest::all();

        return view('pustakawan_dashboard', compact(
            'recentBooks', 'recentJournals', 'recentCds', 'recentFyps', 'recentNewspapers', 'requests', 'books', 'journals', 'cds', 'fyps', 'newspapers'
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
    //Buku
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
        return redirect()->route('pustakawan_dashboard')->with('success', 'Jurnal berhasil diperbarui!');
    }

    //Jurnal
    // Fungsi untuk menambah data jurnal
    public function addJournal(Request $request)
    {
        $validated = $request->validate([
            'juduljurnal' => 'required|string|max:255',
            'namapembuat' => 'required|string|max:255',
            'tahunterbit' => 'required|integer|digits:4|between:1900,2100',
            'jumlahhalaman' => 'required|integer',
            // 'last_updated' => 'required|date_format:Y-m-d H:i:s',
        ]);
    
        // Menambah data buku baru ke database menggunakan create()
        Journal::create([
            'juduljurnal' => $validated['juduljurnal'],
            'namapembuat' => $validated['namapembuat'],
            'tahunterbit' => $validated['tahunterbit'],
            'jumlahhalaman' => $validated['jumlahhalaman'],
            // 'last_updated' => $validated['last_updated'],
        ]);
    
        // Redirect ke halaman dashboard pustakawan dengan pesan sukses
        return redirect()->route('pustakawan_dashboard')->with('success', 'Jurnal berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data jurnal
    public function updateJournal(Request $request, $id)
    {
        $validated = $request->validate([
            'juduljurnal' => 'required|string|max:255',
            'namapembuat' => 'required|string|max:255',
            'tahunterbit' => 'required|integer|digits:4|between:1900,2100',
            'jumlahhalaman' => 'required|integer',
        ]);

        $journal = Journal::findOrFail($id);
        $journal->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'Jurnal berhasil diperbarui!');
    }

    //FYP
    // Fungsi untuk menambah data FYP
    public function addFYP(Request $request)
    {
        $validated = $request->validate([
            'judulfyp' => 'required|string|max:255',
            'namapembuat' => 'required|string|max:255',
            'tahunterbit' => 'required|date',
            'jumlahhalaman' => 'required|integer',
        ]);

        // Menambah data buku baru ke database menggunakan create()
        FYP::create([
            'judulfyp' => $validated['judulfyp'],
            'namapembuat' => $validated['namapembuat'],
            'tahunterbit' => $validated['tahunterbit'],
            'jumlahhalaman' => $validated['jumlahhalaman'],
            // 'last_updated' => $validated['last_updated'],
        ]);

        return redirect()->route('pustakawan_dashboard')->with('success', 'FYP berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data FYP
    public function updateFYP(Request $request, $id)
    {
        $validated = $request->validate([
            'judulfyp' => 'required|string|max:255',
            'namapembuat' => 'required|string|max:255',
            'tahunterbit' => 'required|date',
            'jumlahhalaman' => 'required|integer',
        ]);

        $fyp = FYP::findOrFail($id);
        $fyp->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'FYP berhasil diperbarui!');
    }

    // Fungsi untuk menambah data koran
    public function addNewspaper(Request $request)
    {
        $validated = $request->validate([
            'tanggalterbit' => 'required|date',
            'namapenerbit' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        Newspapers::create([
            'tanggalterbit' => $validated['tanggalterbit'],
            'namapenerbit' => $validated['namapenerbit'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            // 'last_updated' => $validated['last_updated'],
        ]);

        return redirect()->route('pustakawan_dashboard')->with('success', 'Koran berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data koran
    public function updateNewspaper(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggalterbit' => 'required|date',
            'namapenerbit' => 'required|string|max:255',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $newspaper = Newspapers::findOrFail($id);
        $newspaper->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'Koran berhasil diperbarui!');
    }

    // CD
    // Fungsi untuk menambah data CD
    public function addCD(Request $request)
    {
        $validated = $request->validate([
            'judulcd' => 'required|string|max:255',
            'namapenerbit' => 'required|string|max:255',
            'penciptacd' => 'required|string|max:255',
            'tahunterbit' => 'required|integer|digits:4|between:1900,2100',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        // Menambah data cd baru ke database menggunakan create()
         CD::create([
            'judulcd' => $validated['judulcd'],
            'namapenerbit' => $validated['namapenerbit'],
            'penciptacd' => $validated['penciptacd'],
            'tahunterbit' => $validated['tahunterbit'],
            'harga' => $validated['harga'],
            'stok' => $validated['stok'],
            // 'last_updated' => $validated['last_updated'],
        ]);

        return redirect()->route('pustakawan_dashboard')->with('success', 'CD berhasil ditambahkan!');
    }

    // Fungsi untuk memperbarui data CD
    public function updateCD(Request $request, $id)
    {
        $validated = $request->validate([
            'judulcd' => 'required|string|max:255',
            'namapenerbit' => 'required|string|max:255',
            'penciptacd' => 'required|string|max:255',
            'tahunterbit' => 'required|integer|digits:4|between:1900,2100',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
        ]);

        $cd = CD::findOrFail($id);
        $cd->update($validated);

        return redirect()->route('pustakawan_dashboard')->with('success', 'CD berhasil diperbarui!');
    }
}
