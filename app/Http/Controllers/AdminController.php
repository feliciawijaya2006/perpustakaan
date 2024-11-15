<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    // Method untuk menampilkan dashboard admin dan daftar pustakawan
    public function dashboard()
    {
        // Ambil semua pustakawan yang memiliki role 'pustakawan'
        $pustakawans = User::where('role', 'pustakawan')->get();
        return view('admin_dashboard', compact('pustakawans'));
    }

    // Method untuk menambah pustakawan baru
    public function addPustakawan(Request $request)
    {
        // Validasi data pustakawan
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        // Membuat pustakawan baru dengan role 'pustakawan'
        $pustakawan = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'pustakawan',
        ]);

        // Ambil semua pustakawan yang ada dan kirimkan kembali ke view
        $pustakawans = User::where('role', 'pustakawan')->get();

        // Redirect kembali ke halaman dashboard admin dengan data pustakawan terbaru
        return view('admin_dashboard', compact('pustakawans'))->with('success', 'Pustakawan berhasil ditambahkan.');
    }

    // Method untuk menghapus pustakawan
    public function removePustakawan($id)
    {
        $pustakawan = User::findOrFail($id);

        // Pastikan hanya pustakawan yang dihapus
        if ($pustakawan->role === 'pustakawan') {
            $pustakawan->delete();
            return redirect()->route('admin_dashboard')->with('success', 'Pustakawan berhasil dihapus.');
        }

        return redirect()->route('admin_dashboard')->with('error', 'Aksi tidak valid.');
    }
}
