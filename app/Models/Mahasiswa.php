<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';

    protected $fillable = [
        'nim',
        'nama',
        'tgl_lahir',
        'alamat',
        'gender',
    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
