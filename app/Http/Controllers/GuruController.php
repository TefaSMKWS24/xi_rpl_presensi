<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'id_guru' => 'required',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_telphone' => 'required',
        'email' => 'required',
        'password' => 'required',

        ]);

        $data = [
            'id_guru' => $request->id_guru,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telphone' => $request->no_telphone,
            'email' => $request->email,
            'password' => $request->password,
        ];

        DB::table('guru')->insert($data);

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil disimpan.');
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
        'id_guru' => 'required',
        'nama' => 'required',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_telphone' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);

        $data = [
            'id_guru' => $request->id_guru,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_telphone' => $request->no_telphone,
            'email' => $request->email,
            'password' => $request->password,
        ];

        DB::table('guru')->where('id_guru', $id)->update($data);
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
