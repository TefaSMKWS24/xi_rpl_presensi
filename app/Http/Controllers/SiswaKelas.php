<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class SiswaKelas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('siswa_kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa_kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'id_siswa_kelas' => 'required',
            'id_kelas' => 'required',
            'id_siswa' => 'required',
            'id_tahun_ajaran' => 'required',
        ]);

        $data = [
            'id_siswa_kelas' => $request->id_siswa_kelas,
            'id_kelas' => $request->id_kelas,
            'id_siswa' => $request->id_siswa,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
        ];

        DB::table('siswa_kelas')->insert($data);
        return redirect()->view(siswa_kelas.index);
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
            'id_siswa_kelas' => 'required',
            'id_kelas' => 'required',
            'id_siswa' => 'required',
            'id_tahun_ajaran' => 'required',
        ]);

        $data = [
            'id_siswa_kelas' => $request->id_siswa_kelas,
            'id_kelas' => $request->id_kelas,
            'id_siswa' => $request->id_siswa,
            'id_tahun_ajaran' => $request->id_tahun_ajaran,
        ];

        DB::table('siswa_kelas')->where('id_siswa_kelas', $id)->update($data);
        return redirect()->route('siswa_kelas.index')->with('success', 'Data siswa kelas berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
