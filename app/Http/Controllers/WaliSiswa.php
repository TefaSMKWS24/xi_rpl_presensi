<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class WaliSiswa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('wali_siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('wali_siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'id_wali_siswa' => 'required',
            'id_siswa' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'hubungan_siswa' => 'required',
            'alamat' => 'required',
            'no_telphone' => 'required',
            'email' => 'required',
        ]);

        $data = [
            'id_wali_siswa' => $request->id_wali_siswa,
            'id_siswa' => $request->id_siswa,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hubungan_siswa' => $request->hubungan_siswa,
            'alamat' => $request->alamat,
            'no_telphone' => $request->no_telphone,
            'email' => $request->email,
        ];

        DB::table('wali_siswa')->insert($data);
        return redirect()->view(wali_siswa.index);
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
            'id_wali_siswa' => 'required',
            'id_siswa' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'hubungan_siswa' => 'required',
            'alamat' => 'required',
            'no_telphone' => 'required',
            'email' => 'required',
        ]);

        $data = [
            'id_wali_siswa' => $request->id_wali_siswa,
            'id_siswa' => $request->id_siswa,
            'nama' => $request->nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'hubungan_siswa' => $request->hubungan_siswa,
            'alamat' => $request->alamat,
            'no_telphone' => $request->no_telphone,
            'email' => $request->email,
        ];

        DB::table('wali_siswa')->where('id_wali_siswa', $id)->update($data);
        return redirect()->route('wali_siswa.index')->with('success', 'Data wali siswa berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
