<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room_facility extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function roomTypes()
    {
        return $this->belongsToMany(type_room::class, 'room_type_facility');
    }
}
