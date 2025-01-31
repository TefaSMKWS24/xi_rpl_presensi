<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class absensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('absensi.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('absensi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_absensi' => 'required',
            'id_siswa' => 'required',
            'id_jadwal_mapel' => 'required',
            'kehadiran' => 'required',
            'keterangan' => 'required',
            'waktu_absen' => 'required',
            'tanggal_absen' => 'required',
        ]);

        $data = [
            'id_absensi' => $request->id_absensi,
            'id_siswa' => $request->id_siswa,
            'id_jadwal_mapel' => $request->id_jadwal_mapel,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
            'waktu_absen' => $request->waktu_absen,
            'tanggal_absen' => $request->tanggal_absen,
        ];

        DB::table('absensi')->insert($data);
        return redirect()->view(absensi.index);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $absensi = DB::table('absensi')->where('id_absensi', $id)->first();

        return view('absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_absensi' => 'required',
            'id_siswa' => 'required',
            'id_jadwal_mapel' => 'required',
            'kehadiran' => 'required',
            'keterangan' => 'required',
            'waktu_absen' => 'required',
            'tanggal_absen' => 'required',
        ]);

        $data = [
            'id_absensi' => $request->id_absensi,
            'id_siswa' => $request->id_siswa,
            'id_jadwal_mapel' => $request->id_jadwal_mapel,
            'kehadiran' => $request->kehadiran,
            'keterangan' => $request->keterangan,
            'waktu_absen' => $request->waktu_absen,
            'tanggal_absen' => $request->tanggal_absen,
        ];

        DB::table('absensi')->where('absensi', $id)->update($data);
        return redirect()->view('absensi.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('absensi')->where('absensi', $id)->delete();
        return redirect()->view('absensi.index');
    }
}
