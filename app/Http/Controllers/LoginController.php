<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login'); // Menampilkan form login
    }

    public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = User::where('email', $request->email)->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);

        // Redirect based on role
        if ($user->role === 'admin') {
            return redirect()->route('admin_dashboard');
        } elseif ($user->role === 'pustakawan') {
            return redirect()->route('pustakawan_dashboard');
        }

        return redirect()->route('login')->withErrors(['email' => 'Akses ditolak.']);
    }

    return back()->withErrors(['email' => 'Email atau password salah.']);
}
}
