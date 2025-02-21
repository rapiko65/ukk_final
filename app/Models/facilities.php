<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class facilities extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];

    public function roomTypes()
    {
        return $this->belongsToMany(type_room::class, 'room_facilities', 'facility_id', 'type_id');
    }
}
