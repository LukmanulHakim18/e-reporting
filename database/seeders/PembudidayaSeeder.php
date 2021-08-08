<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class PembudidayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        foreach (range(4, 232) as $keyDes => $desa) {
            foreach (range(1, 5) as $key => $value) {
                DB::table('pembudidaya')->insert([
                    'nama_pembudidaya' => $faker->name,
                    'tanggal_lahir' => $faker->date($format = 'Y-m-d', $max = '1995-09-18'),
                    'nik' => $faker->creditCardNumber,
                    'jenis_kelamin' => "Pria",
                    'alamat' => $faker->address,
                    'contact' => $faker->phoneNumber,
                    'desa_id' => $keyDes,
                    // 'desa_id' => '5',
                    'is_deleted' => '0'
                ]);
            }
        }
    }
}
