<?php

use Illuminate\Database\Seeder;
// use Kavist\RajaOngkir\Facades\RajaOngkir;
use GuzzleHttp\Client;


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
        
        // $daftarProvinsi = RajaOngkir::provinsi()->all();
        // foreach($daftarProvinsi as $row){
        //     $provinsi = new Provinsi;
        //     $provinsi->id_provinsi = $row['province_id'];
        //     $provinsi->nama_provinsi = $row['province'];
        //     $provinsi->save();

        //     $daftarKota = RajaOngkir::kota()->dariProvinsi($row['province_id'])->get();
        //     foreach($daftarKota as $rowKota){
        //         $kota= new Kota;
        //         $kota ->id_provinsi = $rowKota['province_id'];
        //         $kota->id_kota = $rowKota['city_id'];
        //         $kota->nama_kota = $rowKota['city_name'];
        //         $kota->save();
        //     }
        // }
        
        //GET PROVINCE
        $client = new Client();

        try {
            $response = $client->get('https://api.rajaongkir.com/starter/province',
            array(
                'headers' => array (
                    'key' => env('RAJAONGKIR_API_KEY','c6254e68e946ac3f5f7ba7e4adcbea0e')
                )
            )
        );
        } catch (RequestException $e) {
            //throw $th;
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        for ($i=0; $i <count($array_result["rajaongkir"]["results"]) ; $i++) { 
            $provinsi = Provinsi::create([
                'id_provinsi' => $array_result["rajaongkir"]["results"][$i]["province_id"],
                'nama_provinsi' => $array_result["rajaongkir"]["results"][$i]["province"]
            ]);
        }

        $client2 = new Client();

        try {
            $response2 = $client2->get('https://api.rajaongkir.com/starter/city',
            array(
                'headers' => array (
                    'key' => env('RAJAONGKIR_API_KEY','c6254e68e946ac3f5f7ba7e4adcbea0e')
                )
            )
        );
        } catch (RequestException $e) {
            //throw $th;
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json2 = $response2->getBody()->getContents();

        $array_result2 = json_decode($json2, true);
        for ($i=0; $i <count($array_result2["rajaongkir"]["results"]) ; $i++) { 
            $kota = Kota::create([
                'id_kota' => $array_result2["rajaongkir"]["results"][$i]["city_id"],
                'id_provinsi' => $array_result2["rajaongkir"]["results"][$i]["province_id"],
                'nama_kota' => $array_result2["rajaongkir"]["results"][$i]["city_name"]
            ]);
        }

    }

}
