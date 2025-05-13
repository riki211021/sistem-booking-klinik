<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Booking;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'spesialis',
        'no_telepon',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
