<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'room_id', 'quantity', 'check_in', 'check_out'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function roomType()
    {
        return $this->belongsTo(room::class);
    }
}
