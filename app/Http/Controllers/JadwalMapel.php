<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class JadwalMapel extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('jadwal_mapel.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jadwal_mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request()->validate([
            'id_jadwal_mapel' => 'required',
            'id_guru' => 'required',
            'id_mapel' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_berakhir' => 'required',
            'id_kelas' => 'required',

        ]);

        $data = [
            'id_jadwal_mapel' => $request->id_jadwal_mapel,
            'id_guru' => $request->id_guru,
            'id_mapel' => $request->id_mapel,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_berakhir' => $request->jam_berakhir,
            'id_kelas' => $request->id_kelas,
        ];

        DB::table('jadwal_mapel')->insert($data);
        return redirect()->route('jadwal_mapel.index')->with('success', 'Data jadwal mapel berhasil disimpan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
           'id_jadwal_mapel' => 'required',
           'id_guru' => 'required',
           'id_mapel' => 'required',
           'hari' => 'required',
           'jam_mulai' => 'required',
           'jam_berakhir' => 'required',
           'id_kelas' => 'required',
        ]);

        $data = [
            'id_jadwal_mapel' => $request->id_jadwal_mapel,
            'id_guru' => $request->id_guru,
            'id_mapel' => $request->id_mapel,
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_berakhir' => $request->jam_berakhir,
            'id_kelas' => $request->id_kelas,
        ];

        DB::table('jadwal_mapel')->where('id_jadwal_mapel', $id)->update($data);
        return redirect()->route('jadwal_mapel.index')->with('success', 'Data jadwal mapel berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
