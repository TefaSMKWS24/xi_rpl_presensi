<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class Login extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('login.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            'id_login' => 'required',
            'aktivitas' => 'required',
            'type_aktivitas' => 'required',
            'data' => 'required',
            'tanggal' => 'required',
            'id_admin' => 'required',
            'id_guru' => 'required',
        ]);

        $data = [
            'id_login' => $request->id_login,
            'aktivitas' => $request->aktivitas,
            'type_aktivitas' => $request->type_aktivitas,
            'data' => $request->data,
            'tanggal' => $request->tanggal,
            'id_admin' => $request->id_admin,
            'id_guru' => $request->id_guru,
        ];

        DB::table('login')->insert($data);
        return redirect()->route('login.index')->with('success', 'Data login berhasil disimpan.');
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
            'id_login' => 'required',
            'aktivitas' => 'required',
            'type_aktivitas' => 'required',
            'data' => 'required',
            'tanggal' => 'required',
            'id_admin' => 'required',
            'id_guru' => 'required',
        ]);

        $data = [
            'id_login' => $request->id_login,
            'aktivitas' => $request->aktivitas,
            'type_aktivitas' => $request->type_aktivitas,
            'data' => $request->data,
            'tanggal' => $request->tanggal,
            'id_admin' => $request->id_admin,
            'id_guru' => $request->id_guru,
        ];

        DB::table('login')->where('id_login', $id)->update($data);
        return redirect()->route('login.index')->with('success', 'Data login berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
