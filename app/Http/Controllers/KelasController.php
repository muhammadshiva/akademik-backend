<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data kelas dari basis data
        $kelas = Kelas::with('departemen')->get();

        // Mengembalikan respon dengan data kelas dalam bentuk JSON
        return response()->json(['data' => $kelas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kelas = Kelas::create([
            'id_departemen' => $request->id_departemen,
            'nama' => $request->nama,
        ]);

        // Mengembalikan respon berhasil dengan data kelas yang telah dibuat
        return response()->json(['message' => 'Kelas berhasil dibuat', 'data' => $kelas], 200);
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
        // Cari data kelas berdasarkan ID
        $kelas = Kelas::find($id);

        // Jika data kelas tidak ditemukan, kembalikan respon error
        if (!$kelas) {
            return response()->json(['message' => 'Data kelas tidak ditemukan'], 404);
        }

        // Update data kelas dengan data baru
        $kelas->update([
            'id_departemen' => $request->id_departemen,
            'nama' => $request->nama,
        ]);

        // Mengembalikan respon berhasil dengan data kelas yang telah diupdate
        return response()->json(['message' => 'Data kelas berhasil diupdate', 'data' => $kelas], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Cari data kelas berdasarkan ID
        $kelas = Kelas::find($id);

        // Jika data kelas tidak ditemukan, kembalikan respon error
        if (!$kelas) {
            return response()->json(['message' => 'Data kelas tidak ditemukan'], 404);
        }

        // Hapus data kelas dari basis data
        $kelas->delete();

        // Mengembalikan respon berhasil dengan pesan sukses
        return response()->json(['message' => 'Data kelas berhasil dihapus'], 200);
    }
}
