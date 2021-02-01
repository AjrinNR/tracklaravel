<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provinsi;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diy = Provinsi::create([
            'kode_prov'=> '1012',
            'nama_prov' => 'DI Yogyakarta',
        ]);
        $bali = Provinsi::create([
            'kode_prov'=> '1013',
            'nama_prov' => 'Bali',
        ]);
        $ntb = Provinsi::create([
            'kode_prov'=> '1014',
            'nama_prov' => 'Nusa Tenggara Barat',
        ]);
        $ntt = Provinsi::create([
            'kode_prov'=> '1015',
            'nama_prov' => 'Nusa Tenggara Timur',
        ]);
        $kalbar = Provinsi::create([
            'kode_prov'=> '1016',
            'nama_prov' => 'Kalimantan Barat',
        ]);
        $kaltim = Provinsi::create([
            'kode_prov'=> '1017',
            'nama_prov' => 'Kalimantan Timur',
        ]);
        $kalteng = Provinsi::create([
            'kode_prov'=> '1018',
            'nama_prov' => 'Kalimantan Tengah',
        ]);
        $kalut = Provinsi::create([
            'kode_prov'=> '1019',
            'nama_prov' => 'Kalimantan Utara',
        ]);
    }
}
