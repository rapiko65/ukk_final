<?php

namespace App\Http\Controllers;

use App\Models\reservations;
use App\Models\room;
use App\Models\type_room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\type;

class ReservationController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'type_id' => 'required|exists:type_rooms,id',
            'check_in' => 'required|date|after_or_equal:today',
            'check_out' => 'required|date|after:check_in',
            'quantity' => 'required|integer|min:1',
        ]);

        DB::beginTransaction();
        try {
            $typeRoom = type_room::findOrFail($request->type_id);

            // Check if quantity is 0
            if ($typeRoom->quantity <= 0) {
                return redirect()->back()->with('error', 'Kamar tidak tersedia.');
            }

            if ($typeRoom->quantity < $request->quantity) {
                return redirect()->back()->with('error', 'Jumlah kamar tidak mencukupi.');
            }

            $reservation = reservations::create([
                'user_id' => Auth::id(),
                'type_id' => $request->type_id,
                'quantity' => $request->quantity,
                'check_in' => $request->check_in,
                'check_out' => $request->check_out,
                'status' => 'pending',
            ]);

            // Kurangi jumlah kamar yang tersedia
            $typeRoom->quantity -= $request->quantity;
            $typeRoom->save();

            DB::commit();
            return redirect()->back()->with('success', 'Reservasi berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan saat membuat reservasi!'. $e->getMessage());
        }
    }





    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:pending,confirmed,checked_in,checked_out,cancelled'
        ]);

        DB::beginTransaction();
        try {
            $reservation = reservations::findOrFail($id);
            $previousStatus = $reservation->status;
            $reservation->status = $request->status;

            // Ambil tipe kamar yang terkait
            $typeRoom = type_room::findOrFail($reservation->type_id);

            // Ambil total kamar yang tersedia di database
            $totalRooms = room::where('type_id', $reservation->type_id)->count();

            // **Jika status berubah ke `checked_out` atau `cancelled`, kembalikan quantity kamar**
            if (
                ($request->status === 'checked_out' && $previousStatus !== 'checked_out') ||
                ($request->status === 'cancelled' && $previousStatus !== 'cancelled')
            ) {
                $typeRoom->quantity += $reservation->quantity;
                if ($typeRoom->quantity > $totalRooms) {
                    $typeRoom->quantity = $totalRooms;
                }
            }

            // Jika status berubah dari checked_out atau cancelled ke status lain
            elseif ($previousStatus === 'checked_out' || $previousStatus === 'cancelled') {
                if ($typeRoom->quantity < $reservation->quantity) {
                    throw new \Exception('Jumlah kamar tidak mencukupi.');
                }
                $typeRoom->quantity = max(0, $typeRoom->quantity - $reservation->quantity);
            }
            $typeRoom->save();
            $reservation->save();

            DB::commit();
            return redirect()->back()->with('success', 'Status reservasi berhasil diperbarui!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        DB::beginTransaction();
        try {
            $reservation = reservations::findOrFail($id);
            $typeRoom = type_room::findOrFail($reservation->type_id);

            // Jika statusnya bukan 'cancelled' atau 'checked_out', tambahkan quantity kembali
            // Cek total kamar yang ada
            $totalRooms = room::where('type_id', $reservation->type_id)->count();

            // Hanya tambahkan quantity jika status bukan cancelled/checked_out
            if (!in_array($reservation->status, ['cancelled', 'checked_out'])) {
                $typeRoom->quantity += $reservation->quantity;
                // Pastikan tidak melebihi total kamar yang tersedia
                if ($typeRoom->quantity > $totalRooms) {
                    $typeRoom->quantity = $totalRooms;
                }
                $typeRoom->save();
            }

            // Hapus reservasi
            $reservation->delete();

            DB::commit();
            return redirect()->back()->with('success', 'Reservasi berhasil dihapus!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

}
