<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use Illuminate\Http\Request;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Departemen::all();

        return response()->json(['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Menyimpan data departemen baru ke dalam basis data
        $departemen = Departemen::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        // Mengembalikan respon berhasil dengan data departemen yang telah dibuat
        return response()->json(['message' => 'Departemen berhasil dibuat', 'data' => $departemen], 200);
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
        // Cari data departemen berdasarkan ID
        $departemen = Departemen::find($id);

        // Jika data departemen tidak ditemukan, kembalikan respon error
        if (!$departemen) {
            return response()->json(['message' => 'Data departemen tidak ditemukan'], 404);
        }

        // Update data departemen dengan data baru
        $departemen->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        // Mengembalikan respon berhasil dengan data departemen yang telah diupdate
        return response()->json(['message' => 'Data departemen berhasil diupdate', 'data' => $departemen], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Cari data departemen berdasarkan ID
        $departemen = Departemen::find($id);

        // Jika data departemen tidak ditemukan, kembalikan respon error
        if (!$departemen) {
            return response()->json(['message' => 'Data departemen tidak ditemukan'], 404);
        }

        // Hapus data departemen dari basis data
        $departemen->delete();

        // Mengembalikan respon berhasil dengan pesan sukses
        return response()->json(['message' => 'Data departemen berhasil dihapus'], 200);
    }
}
