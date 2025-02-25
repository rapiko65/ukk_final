<?php

namespace App\Http\Controllers;

use App\Models\facilities;
use App\Models\facilities_hotel;
use App\Models\reservations;
use App\Models\type_room;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $roomType = type_room::with(['rooms', 'facilities'])->get();
        // return response()->json($roomType);
        return view('main-dashboard.index', compact('roomType'));
    }

    public function Rooms(){
        $roomType = type_room::with(['rooms', 'facilities'])->get();
        return view('main-dashboard.rooms.index',compact('roomType'));
    }

    public function facilities(){
        $facility = facilities_hotel::all();
        return view('main-dashboard.facilities.index',compact('facility'));
    }

    public function history($id){
        $reservation = reservations::where('user_id', $id)
                                 ->orderBy('created_at', 'desc')
                                 ->get();
        return view('main-dashboard.history.index', compact('reservation'));
    }
}