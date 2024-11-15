<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsPustakawan
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna memiliki peran 'pustakawan'
        if (Auth::user()->role !== 'pustakawan') {
            return redirect()->route('login');
        }

        return $next($request);
    }
}


