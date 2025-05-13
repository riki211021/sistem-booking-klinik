<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;


class DokterController extends Controller
{
    // CREATE
// DokterController.php
public function store(Request $request)
{
    Dokter::create([
        'nama' => $request->nama,
        'spesialis' => $request->spesialis,
        'no_telepon' => $request->no_telepon,
    ]);

    return redirect()->route('dokter.index')->with('success', 'Dokter berhasil ditambahkan');
}
public function create()
{
    return view('dokter.create'); 
}



    // READ - semua dokter
  public function index()
{
    $dokters = Dokter::all();
    return view('dokter.index', compact('dokters'));
}


    // READ - detail dokter
    public function show($id)
    {
        return response()->json(Dokter::findOrFail($id));
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->update($request->all());
       
return redirect()->route('dokter.index')->with('success', 'Data dokter berhasil diperbarui');

    }

    // DELETE
    public function destroy($id)
    {
        $dokter = Dokter::findOrFail($id);
        $dokter->delete();
return redirect()->route('dokter.index')->with('success', 'Data berhasil dihapus');

       
    }


public function edit($id)
{
    $dokter = Dokter::findOrFail($id);
    return view('dokter.edit', compact('dokter'));
}


}
