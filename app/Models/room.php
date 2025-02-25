<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type_id', 'lokasi_file', 'description', 'price', 'capacity'];

    public function facilities()
    {
        return $this->belongsToMany(facilities::class, 'room_facilities', 'room_id', 'facility_id');
    }

    public function typeRoom()
    {
        return $this->belongsTo(type_room::class, 'type_id');
    }

    protected static function boot()
    {
        parent::boot();

        // Saat kamar dibuat atau dihapus, update quantity di type_rooms
        static::created(function ($room) {
            if ($room->typeRoom) {
                $room->typeRoom->updateRoomCount();
            }
        });

        static::deleted(function ($room) {
            if ($room->typeRoom) {
                $room->typeRoom->updateRoomCount();
            }
        });
    }
}
