<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_room extends Model
{
    use HasFactory;

    protected $table = 'type_rooms';
    protected $fillable = ['type', 'quantity','price'];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'type_id');
    }

    public function facilities()
    {
        return $this->belongsToMany(facilities::class, 'room_facilities', 'type_id', 'facility_id');
    }

    public function reservations()
    {
        return $this->hasMany(reservations::class, 'type_id');
    }

    public function updateRoomCount()
    {
        $this->quantity = $this->rooms()->count();
        $this->save();
    }
}
