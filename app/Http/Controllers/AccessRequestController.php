<?php
// app/Http/Controllers/AccessRequestController.php

namespace App\Http\Controllers;

use App\Models\AccessRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccessRequestController extends Controller
{
    // Menampilkan halaman pengajuan akses
    public function showRequestForm()
    {
        return view('access_request.form');
    }

    // Menyimpan pengajuan akses
    public function storeRequest(Request $request)
    {
        $request->validate([
            'access_type' => 'required|string',
            'reason' => 'required|string',
        ]);

        AccessRequest::create([
            'user_id' => Auth::id(),
            'access_type' => $request->access_type,
            'reason' => $request->reason,
            'status' => 'pending',
        ]);

        return redirect()->route('access.requests')->with('success', 'Pengajuan akses berhasil!');
    }

    // Menampilkan halaman daftar pengajuan akses
    public function showRequests()
    {
        $requests = AccessRequest::all(); // Menampilkan semua permintaan akses
        return view('pengajuan', compact('requests'));
    }

    // Menyetujui atau menolak pengajuan akses
    public function updateRequestStatus($id, $status)
    {
        $request = AccessRequest::findOrFail($id);
        $request->status = $status;
        $request->save();

        return redirect()->route('access.requests')->with('success', 'Status permintaan berhasil diperbarui!');
    }
}
