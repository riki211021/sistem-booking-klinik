<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'no_telepon'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
