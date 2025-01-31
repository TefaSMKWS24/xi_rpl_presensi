<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class Mapel extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mapel.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'id_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $data = [
            'id_mapel' => $request->id_mapel,
            'nama_mapel' => $request->nama_mapel,
        ];

        DB::table('mapel')->insert($data);
        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil disimpan.');
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
            'id_mapel' => 'required',
            'nama_mapel' => 'required',
        ]);

        $data = [
            'id_mapel' => $request->id_mapel,
            'nama_mapel' => $request->nama_mapel,
        ];

        DB::table('mapel')->where('id_mapel', $id)->update($data);
        return redirect()->route('mapel.index')->with('success', 'Data mapel berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
