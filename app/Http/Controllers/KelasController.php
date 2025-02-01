<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class Kelas extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('kelas.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      request()->validate([
          'id_kelas' => 'required',
          'nama_kelas' => 'required',
          'id_guru' => 'required',
      ]);

      $data = [
          'id_kelas' => $request->id_kelas,
          'nama_kelas' => $request->nama_kelas,
          'id_guru' => $request->id_guru,
      ];

      DB::table('kelas')->insert($data);
      return redirect()->view(kelas.index);
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
        $data = DB::table('kelas')->where('kelas', $id)->first();
        return view('kelas.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_kelas' => 'required',
            'nama_kelas' => 'required',
            'id_guru' => 'required',
        ]);

        $data = [
            'id_kelas' => $request->id_kelas,
            'nama_kelas' => $request->nama_kelas,
            'id_guru' => $request->id_guru,
        ];

        DB::table('kelas')->where('kelas', $id)->update($data);
        return redirect()->view('kelas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('kelas')->where('kelas', $id)->delete($data);
        return redirect()->view('kelas.index');
    }
}
