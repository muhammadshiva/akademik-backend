<?php

use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatakuliahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Dosen
Route::get('/dosen', [DosenController::class, 'index']);
Route::post('/create-dosen', [DosenController::class, 'create']);
Route::post('/{id}/update-dosen', [DosenController::class, 'update']);
Route::delete('/{id}/delete-dosen', [DosenController::class, 'delete']);

// Matakuliah
Route::get('/matakuliah', [MatakuliahController::class, 'index']);
Route::post('/create-matakuliah', [MatakuliahController::class, 'create']);
Route::post('/{id}/update-matakuliah', [MatakuliahController::class, 'update']);
Route::delete('/{id}/delete-matakuliah', [MatakuliahController::class, 'delete']);

// Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
Route::post('/create-mahasiswa', [MahasiswaController::class, 'create']);
Route::post('/{id}/update-mahasiswa', [MahasiswaController::class, 'update']);
Route::delete('/{id}/delete-mahasiswa', [MahasiswaController::class, 'delete']);

// Departemen
Route::get('/departemen', [DepartemenController::class, 'index']);
Route::post('/create-departemen', [DepartemenController::class, 'create']);
Route::post('/{id}/update-departemen', [DepartemenController::class, 'update']);
Route::delete('/{id}/delete-departemen', [DepartemenController::class, 'delete']);

// Kelas
Route::get('/kelas', [KelasController::class, 'index']);
Route::post('/create-kelas', [KelasController::class, 'create']);
Route::post('/{id}/update-kelas', [KelasController::class, 'update']);
Route::delete('/{id}/delete-kelas', [KelasController::class, 'delete']);

// Jadwal
Route::get('/jadwal', [JadwalController::class, 'index']);
Route::post('/create-jadwal', [JadwalController::class, 'create']);
Route::post('/{id}/update-jadwal', [JadwalController::class, 'update']);
Route::delete('/{id}/delete-jadwal', [JadwalController::class, 'delete']);
