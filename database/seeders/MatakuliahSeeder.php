<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;
use Faker\Factory as Faker;

class MatakuliahSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 10; $i++) {
            Matakuliah::create([
                'kode' => strtoupper($faker->lexify('??##')), // 2 huruf + 2 angka acak
                'nama' => $faker->words(3, true), // Nama matakuliah acak dengan 3 kata
                'sks' => $faker->numberBetween(1, 4), // Jumlah SKS acak antara 1-4
            ]);
        }
    }
}
