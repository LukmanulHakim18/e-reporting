<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;


class pendapatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bulan = [
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        ];
        $faker = Faker::create();
        foreach (range(1, 1148) as $keyPem => $pembudidaya) {
            foreach (range(1, 3) as $keyBulan => $Dbulan) {
                foreach (range(1, 3) as $keyIkan => $ikan) {
                    DB::table('laporan')->insert([
                        'pembudidaya_id' => $keyPem + 1,
                        // 'pembudidaya_id' => 11,
                        "ikan_id" => $faker->numberBetween($min = 1, $max = 3),
                        'bulan' => $bulan[$faker->numberBetween($min = 0, $max = 11)],
                        'tahun' => "2019",
                        'jumlah_pendapatan' => $faker->numberBetween($min = 10, $max = 150),
                    ]);
                }
            }
        }
    }
}
