<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pasien_id')->constrained('pasiens')->onDelete('cascade');
            $table->foreignId('dokter_id')->constrained('dokters')->onDelete('cascade');
            $table->dateTime('jadwal'); // kolom jadwal booking
            $table->timestamps();
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
