<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Mengambil semua data jadwal beserta data kelas, dosen, dan matakuliah terkait
        $jadwal = Jadwal::with(['kelas', 'dosen', 'matakuliah'])->get();

        // Mengembalikan respon dengan data jadwal dalam bentuk JSON
        return response()->json(['data' => $jadwal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // Menyimpan data jadwal baru ke dalam basis data
        $jadwal = Jadwal::create([
            'id_kelas' => $request->id_kelas,
            'id_dosen' => $request->id_dosen,
            'id_matakuliah' => $request->id_matakuliah,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        // Mengembalikan respon berhasil dengan data jadwal yang telah dibuat
        return response()->json(['message' => 'Jadwal berhasil dibuat', 'data' => $jadwal], 200);
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
        // Cari data jadwal berdasarkan ID
        $jadwal = Jadwal::find($id);

        // Jika data jadwal tidak ditemukan, kembalikan respon error
        if (!$jadwal) {
            return response()->json(['message' => 'Data jadwal tidak ditemukan'], 404);
        }

        // Update data jadwal dengan data baru
        $jadwal->update([
            'id_kelas' => $request->id_kelas,
            'id_dosen' => $request->id_dosen,
            'id_matakuliah' => $request->id_matakuliah,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
        ]);

        // Mengembalikan respon berhasil dengan data jadwal yang telah diupdate
        return response()->json(['message' => 'Data jadwal berhasil diupdate', 'data' => $jadwal], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        // Cari data jadwal berdasarkan ID
        $jadwal = Jadwal::find($id);

        // Jika data jadwal tidak ditemukan, kembalikan respon error
        if (!$jadwal) {
            return response()->json(['message' => 'Data jadwal tidak ditemukan'], 404);
        }

        // Hapus data jadwal dari basis data
        $jadwal->delete();

        // Mengembalikan respon berhasil dengan pesan sukses
        return response()->json(['message' => 'Data jadwal berhasil dihapus'], 200);
    }
}
