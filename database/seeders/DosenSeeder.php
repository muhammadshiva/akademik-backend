<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Dosen;
use Faker\Factory as Faker;

class DosenSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create('id_ID'); // Menggunakan bahasa Indonesia untuk nama

        for ($i = 1; $i <= 10; $i++) {
            Dosen::create([
                'nip' => $faker->unique()->numerify('##########'), // 10 digit angka unik
                'nama' => $faker->name
            ]);
        }
    }
}
