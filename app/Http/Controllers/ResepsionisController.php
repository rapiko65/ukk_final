<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResepsionisController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            if (auth()->user()->role === 'resepsionis' || auth()->user()->role === 'admin') {
                return $next($request);
            }
            abort(403, 'Unauthorized action.');
        });
    }

    public function dashboard()
    {
        return view('resepsionis-dashboard.home-dashboard.index');
    }

    // public function bookings()
    // {
    //     $bookings = \App\Models\Booking::all();
    //     return view('resepsionis.bookings', compact('bookings'));
    // }
}
