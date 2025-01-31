<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class MapelGuru extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mapel_guru.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mapel_guru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'id_mapel_guru' => 'required',
            'id_mapel' => 'required',
            'id_guru' => 'required',
        ]);

        $data = [
            'id_mapel_guru' => $request->id_mapel_guru,
            'id_mapel' => $request->id_mapel,
            'id_guru' => $request->id_guru,
        ];

        DB::table('mapel_guru')->insert($data);
        return redirect()->route('mapel_guru.index')->with('success', 'Data mapel guru berhasil disimpan.');
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
            'id_mapel_guru' => 'required',
            'id_mapel' => 'required',
            'id_guru' => 'required',
        ]);

        $data = [
            'id_mapel_guru' => $request->id_mapel_guru,
            'id_mapel' => $request->id_mapel,
            'id_guru' => $request->id_guru,
        ];

        DB::table('mapel_guru')->where('id_mapel_guru', $id)->update($data);
        return redirect()->route('mapel_guru.index')->with('success', 'Data mapel guru berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
