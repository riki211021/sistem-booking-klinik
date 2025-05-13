<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dokter;
use App\Models\Pasien;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Dokter::factory(5)->create();
        Pasien::factory(10)->create();
        Booking::factory(15)->create();
    }
}
