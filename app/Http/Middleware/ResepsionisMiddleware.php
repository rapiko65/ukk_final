<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ResepsionisMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Izinkan hanya admin dan resepsionis
        if (in_array(Auth::user()->role, ['resepsionis', 'admin'])) {
            return $next($request);
        }

        // Jika role tidak sesuai, tampilkan error
        abort(403, 'Unauthorized access');
    }
}
