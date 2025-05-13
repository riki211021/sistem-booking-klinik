<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\Dokter;
use App\Models\Pasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    protected $model = Booking::class;

    public function definition()
    {
        return [
            'dokter_id' => Dokter::inRandomOrder()->first()->id ?? Dokter::factory(),
            'pasien_id' => Pasien::inRandomOrder()->first()->id ?? Pasien::factory(),
            'tanggal_booking' => $this->faker->date(),
        ];
    }
}
