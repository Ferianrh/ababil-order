<?php

use Illuminate\Database\Seeder;
use Kavist\RajaOngkir\Facades\RajaOngkir;

use App\Models\Provinsi;
use App\Models\Kota;


class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarProvinsi = RajaOngkir::provinsi()->all();
        foreach($daftarProvinsi as $row){
            Provinsi::create([
                'province_id' => $row['province_id'],
                'nama_provinsi' => $row['province']
            ]);
            $daftarKota = RajaOngkir::kota()->dariProvinsi($row['province_id'])->get();
            foreach($daftarKota as $rowKota){
                Kota::create([
                    'province_id' => $rowKota['province_id'],
                    'id_kota' => $rowKota['city_id'],
                    'nama_kota' => $rowKota['city_name']
                ]);
            }
        }
        
    }
}
