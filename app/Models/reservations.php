<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = ['user_id', 'type_id', 'room_id', 'quantity', 'check_in', 'check_out', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'reservation_rooms');
    }

    public function typeRoom()
    {
        return $this->belongsTo(type_room::class, 'type_id');
    }

    // protected static function boot()
    // {
        // parent::boot();

        // // Saat reservasi dibuat, kurangi quantity di type_rooms
        // static::created(function ($reservation) {
        //     $typeRoom = type_room::find($reservation->type_id);
        //     if ($typeRoom) {
        //         $typeRoom->decrement('quantity', $reservation->quantity);
        //     }
        // });

        // // Saat reservasi dibatalkan/hapus, kembalikan quantity ke type_rooms
        // static::deleted(function ($reservation) {
        //     $typeRoom = type_room::find($reservation->type_id);
        //     if ($typeRoom) {
        //         $typeRoom->increment('quantity', $reservation->quantity);
        //     }
        // });

        // static::updated(function ($reservation) {
        //     if ($reservation->isDirty('status')) {
        //     $typeRoom = type_room::find($reservation->type_id);
        //     if ($typeRoom) {
        //         if ($reservation->status === 'checked_out' || $reservation->status === 'cancelled') {
        //         $typeRoom->increment('quantity', $reservation->quantity);
        //         } else {
        //         // Decrement for other status changes
        //         $typeRoom->decrement('quantity', $reservation->quantity);
        //         }
        //     }
        //     }
        // });
    // }



    


}
