<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Pasien;
use App\Models\Dokter;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['pasien', 'dokter'])->get();
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('booking', compact('bookings', 'pasiens', 'dokters'));
    }

    public function store(Request $request)
    {
        Booking::create([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'jadwal' => $request->jadwal,
        ]);
        return redirect()->route('booking.index')->with('success', 'Booking berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $pasiens = Pasien::all();
        $dokters = Dokter::all();
        return view('edit_booking', compact('booking', 'pasiens', 'dokters'));
    }

    public function update(Request $request, $id)
    {
        Booking::findOrFail($id)->update([
            'pasien_id' => $request->pasien_id,
            'dokter_id' => $request->dokter_id,
            'jadwal' => $request->jadwal,
        ]);
        return redirect()->route('booking.index')->with('success', 'Booking berhasil diupdate!');
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('booking.index')->with('success', 'Booking berhasil dihapus!');
    }

}
