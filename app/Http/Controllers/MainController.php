<?php

namespace App\Http\Controllers;

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
}