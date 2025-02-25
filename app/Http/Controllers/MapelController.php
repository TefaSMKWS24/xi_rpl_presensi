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
        return redirect()->view(mapel.index);
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
        $data = DB::table('mapel')->where('mapel', $id)->first();
        return view('mapel.edit', compact('data'));
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

        DB::table('mapel')->where('mapel', $id)->update($data);
        return redirect()->route('mapel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('mapel')->where('mapel', $id)->delete();
        return redirect()->route('mapel.index');
    }
}
