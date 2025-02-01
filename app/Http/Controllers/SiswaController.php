<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class Siswa extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'id_siswa' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'tahun_masuk' => 'required',
            'status_masuk' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'no_telphone' => 'required',
            'tahun_keluar' => 'required',
        ]);

        $data = [
            'id_siswa' => $request->id_siswa,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tahun_masuk' => $request->tahun_masuk,
            'status_masuk' => $request->status_masuk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'no_telphone' => $request->no_telphone,
            'tahun_keluar' => $request->tahun_keluar,
        ];

        DB::table('siswa')->insert($data);
        return redirect()->view(siswa.index);
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
        $data = DB::table('siswa')->where('id_siswa', $id)->first();
        return view('siswa.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_siswa' => 'required',
            'nisn' => 'required',
            'nama' => 'required',
            'tahun_masuk' => 'required',
            'status_masuk' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'no_telphone' => 'required',
            'tahun_keluar' => 'required',
        ]);

        $data = [
            'id_siswa' => $request->id_siswa,
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'tahun_masuk' => $request->tahun_masuk,
            'status_masuk' => $request->status_masuk,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'no_telphone' => $request->no_telphone,
            'tahun_keluar' => $request->tahun_keluar,
        ];

        DB::table('siswa')->where('siswa', $id)->update($data);
        return redirect()->view('siswa.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('siswa')->where('siswa', $id)->delete();
        return redirect()->view('siswa.index');
    }
}
