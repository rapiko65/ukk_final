<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_room extends Model
{
    use HasFactory;
    protected $table = 'type_rooms';
    protected $fillable = ['type'];

    
    public function rooms()
    {
        return $this->hasMany(room::class, 'type_id');
    }

    public function facilities()
    {
        return $this->belongsToMany(facilities::class, 'room_facilities', 'type_id', 'facility_id');
    }

    public function getRoomCountAttribute()
    {
        return $this->rooms()->count();
    }
}
