<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\redirect;
use Illuminate\Support\Facades\validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'id_admin' => 'required',
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);

        $data = [
            'id_admin' => $request->id_admin,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ];

        DB::table('admin')->insert($data);
        return redirect()->view(admin.index);

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
        $data = DB::table('admin')->where('id_admin', $id)->first();
        return view('admin.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'id_admin' => 'required',
        'nama' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);

        $data = [
            'id_admin' => $request->id_admin,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
        ];

        DB::table('admin')->where('admin', $id)->update($data);
        return redirect()->view('admin.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        DB::table('admin')->where('admin', $id)->delete();
        return redirect()->view('admin.index');
    }
}
