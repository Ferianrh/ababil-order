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
            $provinsi = new Provinsi;
            $provinsi->province_id = $row['province_id'];
            $provinsi->nama_provinsi = $row['province'];
            $provinsi->save();

            $daftarKota = RajaOngkir::kota()->dariProvinsi($row['province_id'])->get();
            foreach($daftarKota as $rowKota){
                $kota= new Kota;
                $kota ->province_id = $rowKota['province_id'];
                $kota->city_id = $rowKota['city_id'];
                $kota->nama_kota = $rowKota['city_name'];
            }
        }
        
    }
}
