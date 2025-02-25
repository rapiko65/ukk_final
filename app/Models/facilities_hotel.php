<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class facilities_hotel extends Model
{
    use HasFactory;
    protected $table = 'facilities_hotels';
    protected $fillable = ['name', 'description','lokasi_file'];
}
