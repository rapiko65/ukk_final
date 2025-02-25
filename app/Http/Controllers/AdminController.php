<?php

namespace App\Http\Controllers;

use App\Models\facilities;
use App\Models\facilities_hotel;
use App\Models\room;
use App\Models\room_facility;
use App\Models\type_room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function PHPSTORM_META\type;

class AdminController extends Controller
{
    //user
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function dashboard()
    {
        return view('admin-dashboard.home-dashboard.index');
    }

    public function users()
    {
        return view('admin.users', compact('users'));
    }

    public function ShowUser(){
        $pelanggan = User::all();
        return view('admin-dashboard.users.index', compact('pelanggan'));

    }

    public function EditUser($id){
        $user = User::find($id);
        return view('admin-dashboard.users.edit', compact('user'));
    }

    public function UpdateUser(Request $request, $id){
        $user = User::find($id);

        $user->update($request->all());
        return redirect()->route('admin.users');
    }

    public function destroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('admin.users');
    }
    //rooms
    public function ShowRoom(){
        // $type_facilities = type_room::with(['rooms', 'facilities'])->get();
        $roomType = type_room::with(['rooms', 'facilities'])->get();
        return view('admin-dashboard.kamar.type-kamar.index',compact('roomType'));
    }


    public function RoomTypeCreate(){
        $roomType = type_room::all();
        return view('admin-dashboard.kamar.type-kamar.create',compact('roomType'));
    }

    public function RoomsCreate(){
        $roomType = type_room::all();
        return view('admin-dashboard.kamar.create',compact('roomType'));
    }



    public function RoomTypeStore(Request $request){
        $request->validate([
            'type' => 'required',
            'price' => 'required',
        ]);

        // $room_types = type_room::create($request->all());
        // return redirect()->route('admin.rooms');
        $room_types = type_room::create($request->all());

        if ($room_types) {
            return redirect()->route('admin.rooms')->with('success', 'Kamar berhasil ditambahkan');
        } else {
            return redirect()->route('admin.rooms')->withErrors(['error' => 'Terjadi kesalahan saat menyimpan kamar.']);
        }
    }


    public function RoomStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type_id' => 'required',
            'lokasi_file' => 'required|file|image|max:1024',
            'description' => 'required',
            // 'price' => 'required|numeric',
            'capacity' => 'required|integer',
        ]);

        try {
            $filePath = $request->file('lokasi_file')->store('room_images', 'public');
            $room = room::create([
                'name' => $request->name,
                'type_id' => $request->type_id,
                'lokasi_file' => $filePath,
                'description' => $request->description,
                // 'price' => $request->price,
                'capacity' => $request->capacity,
            ]);

            return redirect()->route('admin.rooms')->with('success', 'Kamar berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('admin.rooms')->withErrors(['error' => 'Terjadi kesalahan saat menyimpan kamar.']);
        }
    }

    public function DestroyRoom($id)
    {
        try {
            $room = room::find($id);

            if (!$room) {
                return redirect()->route('admin.rooms')->withErrors(['error' => 'Kamar tidak ditemukan.']);
            }

            // Delete the room image from storage if it exists
            if ($room->lokasi_file) {
                Storage::disk('public')->delete($room->lokasi_file);
            }

            $room->delete();
            return redirect()->route('admin.rooms')->with('success', 'Kamar berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.rooms')->withErrors(['error' => 'Terjadi kesalahan saat menghapus kamar.']);
        }
    }

    public function DestroyRoomType($id)
    {
        try {
            $roomType = type_room::find($id);

            if (!$roomType) {
                return redirect()->route('admin.rooms')->withErrors(['error' => 'Tipe kamar tidak ditemukan.']);
            }

            $rooms = $roomType->rooms;

            foreach ($rooms as $room) {
                if ($room->lokasi_file) {
                    Storage::disk('public')->delete($room->lokasi_file);
                }
            }

            $roomType->delete();

            return redirect()->route('admin.rooms')->with('success', 'Tipe kamar dan semua kamar terkait berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.rooms')->withErrors(['error' => 'Terjadi kesalahan saat menghapus tipe kamar.']);
        }
    }

    //facilty
    public function ShowFacilities(){
        $facility = facilities::all();
        return view('admin-dashboard.facility.index',compact('facility'));
    }

    public function CreateFacilities() {
        $roomTypes = type_room::all();
        return view('admin-dashboard.facility.create',compact('roomTypes'));
    }

    public function StoreFacilities(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_rooms' => 'array',
            'type_rooms.*' => 'exists:type_rooms,id',
        ]);

        $facilities = facilities::create($request->only(['name', 'description']));

        if ($request->has('type_rooms')) {
            $facilities->roomTypes()->sync($request->type_rooms);
        }


        return redirect()->route('admin.facilities')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function ShowFacilitiesHotel(){
        $facilities = facilities_hotel::all();
        return view('admin-dashboard.facility-hotel.index', compact('facilities'));
    }

    public function CreateFacilitiesHotel(){
        return view('admin-dashboard.facility-hotel.create');
    }

    public function StoreFacilitiesHotel(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'lokasi_file' => 'required', // Add image validation
        ]);

        try {
            $filePath = $request->file('lokasi_file')->store('facility_images', 'public');
            
            $facilities = facilities_hotel::create([
                'name' => $request->name,
                'description' => $request->description,
                'lokasi_file' => $filePath,
            ]);

            return redirect()->route('admin.facilities-hotel')->with('success', 'Fasilitas berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->route('admin.facilities-hotel')->withErrors(['error' => 'Terjadi kesalahan saat menyimpan fasilitas.']);
        }
    }

    public function DestroyFacilitiesHotel($id)
    {
        try {
            $facility = facilities_hotel::find($id);

            if (!$facility) {
                return redirect()->route('admin.facilities')->withErrors(['error' => 'Fasilitas tidak ditemukan.']);
            }

            $facility->delete();

            return redirect()->route('admin.facilities')->with('success', 'Fasilitas berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.facilities')->withErrors(['error' => 'Terjadi kesalahan saat menghapus fasilitas: ']);
        }
    }

    public function DestroyFacilities($id)
    {
        try {
            $facility = facilities::find($id);

            if (!$facility) {
                return redirect()->route('admin.facilities')->withErrors(['error' => 'Fasilitas tidak ditemukan.']);
            }

            // Delete facility and its relationships
            $facility->roomTypes()->detach();
            $facility->delete();

            return redirect()->route('admin.facilities')->with('success', 'Fasilitas berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('admin.facilities')->withErrors(['error' => 'Terjadi kesalahan saat menghapus fasilitas: ']);
        }
    }

}
