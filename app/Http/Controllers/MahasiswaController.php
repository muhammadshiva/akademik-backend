<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();

        return response()->json(['data' => $data], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Menyimpan data mahasiswa baru ke dalam basis data
        $mahasiswa = Mahasiswa::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
        ]);

        // Mengembalikan respon berhasil dengan data mahasiswa yang telah dibuat
        return response()->json(['message' => 'Data mahasiswa berhasil ditambahkan', 'data' => $mahasiswa], 201);
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
        // Cari data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        // Jika data mahasiswa tidak ditemukan, kembalikan respon error
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data mahasiswa tidak ditemukan'], 404);
        }

        // Update data mahasiswa dengan data baru
        $mahasiswa->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'tgl_lahir' => $request->tgl_lahir,
            'alamat' => $request->alamat,
            'gender' => $request->gender,
        ]);

        // Mengembalikan respon berhasil dengan data mahasiswa yang telah diupdate
        return response()->json(['message' => 'Data mahasiswa berhasil diupdate', 'data' => $mahasiswa], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Cari data mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        // Jika data mahasiswa tidak ditemukan, kembalikan respon error
        if (!$mahasiswa) {
            return response()->json(['message' => 'Data mahasiswa tidak ditemukan'], 404);
        }

        // Hapus data mahasiswa dari basis data
        $mahasiswa->delete();

        // Mengembalikan respon berhasil dengan pesan sukses
        return response()->json(['message' => 'Data mahasiswa berhasil dihapus'], 200);
    }
}
