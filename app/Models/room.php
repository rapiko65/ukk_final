<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    use HasFactory;
    protected $fillable = ['name','type_id', 'lokasi_file', 'description', 'price', 'capacity','facility_id'];

    public function facilities()
    {
        return $this->belongsToMany(facilities::class, 'room_facilities', 'type_id', 'facility_id');
    }

    public function typeRoom()
    {
        return $this->belongsTo(type_room::class, 'type_id');
    }
}