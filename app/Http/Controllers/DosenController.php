<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Dosen::all();

        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Menyimpan data dosen baru ke dalam basis data
        $dosen = Dosen::create([
            'nip' => $request->nip,
            'nama' => $request->nama,
        ]);

        // Mengembalikan respon berhasil dengan data dosen yang telah dibuat
        return response()->json(['message' => 'Data dosen berhasil ditambahkan', 'data' => $dosen], 201);
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
    public function update(Request $request, $id)
    {
        $dosen = Dosen::find($id);

        // Jika data dosen tidak ditemukan, kembalikan respon error
        if (!$dosen) {
            return response()->json(['message' => 'Data dosen tidak ditemukan'], 404);
        }

        // Update data dosen dengan data baru
        $dosen->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
        ]);

        // Mengembalikan respon berhasil dengan data dosen yang telah diupdate
        return response()->json(['message' => 'Data dosen berhasil diupdate', 'data' => $dosen], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Cari data dosen berdasarkan ID
        $dosen = Dosen::find($id);

        // Jika data dosen tidak ditemukan, kembalikan respon error
        if (!$dosen) {
            return response()->json(['message' => 'Data dosen tidak ditemukan'], 404);
        }

        // Hapus data dosen dari basis data
        $dosen->delete();

        // Mengembalikan respon berhasil dengan pesan sukses
        return response()->json(['message' => 'Data dosen berhasil dihapus'], 200);
    }
}
