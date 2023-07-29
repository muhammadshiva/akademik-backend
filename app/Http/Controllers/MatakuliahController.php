<?php

namespace App\Http\Controllers;

use App\Models\Matakuliah;
use Illuminate\Http\Request;

class MatakuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Matakuliah::all();

        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $matakuliah = Matakuliah::create([
            'kode' => $request->kode, // Mengubah kode menjadi huruf kapital
            'nama' => $request->nama,
            'sks' => $request->sks,
        ]);

        // Mengembalikan respon berhasil dengan data matakuliah yang telah dibuat
        return response()->json(['message' => 'Data matakuliah berhasil ditambahkan', 'data' => $matakuliah], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Cari data matakuliah berdasarkan ID
        $matakuliah = Matakuliah::find($id);

        // Jika data matakuliah tidak ditemukan, kembalikan respon error
        if (!$matakuliah) {
            return response()->json(['message' => 'Data matakuliah tidak ditemukan'], 404);
        }

        // Update data matakuliah dengan data baru
        $matakuliah->update([
            'kode' => strtoupper($request->kode), // Mengubah kode menjadi huruf kapital
            'nama' => $request->nama,
            'sks' => $request->sks,
        ]);

        // Mengembalikan respon berhasil dengan data matakuliah yang telah diupdate
        return response()->json(['message' => 'Data matakuliah berhasil diupdate', 'data' => $matakuliah], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Cari data matakuliah berdasarkan ID
        $matakuliah = Matakuliah::find($id);

        // Jika data matakuliah tidak ditemukan, kembalikan respon error
        if (!$matakuliah) {
            return response()->json(['message' => 'Data matakuliah tidak ditemukan'], 404);
        }

        // Hapus data matakuliah dari basis data
        $matakuliah->delete();

        // Mengembalikan respon berhasil dengan pesan sukses
        return response()->json(['message' => 'Data matakuliah berhasil dihapus'], 200);
    }
}
