<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;


use App\Models\Provinsi;
use App\Models\Kota;

class LocationsController extends Controller
{
    public function getProvince(){
        $prov = Provinsi::get();

        return response()->json($prov);
    }

    public function getCity($id){
        $kota = Kota::where('id_provinsi',$id)->get();
        return response()->json($kota);
    }

    //for shipping

    public function getCost(Request $request){
        //shipping process
        $client = new Client();

        try {
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
            array(
                'body' => 'origin=247&destination='.$request->kota.'&weight='.$request->berat.'&courier='.$request->kurir,
                'headers' => array (
                    'key' => env('RAJAONGKIR_API_KEY','c6254e68e946ac3f5f7ba7e4adcbea0e'),
                    'content-type' => 'application/x-www-form-urlencoded',
                )
            )
        );
        } catch (RequestException $e) {
            //throw $th;
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        return $array_result['rajaongkir']['results'][0];

        
    }

    public function getService(Request $request){
        //shipping process
        $client = new Client();

        try {
            $response = $client->request('POST','https://api.rajaongkir.com/starter/cost',
            array(
                'body' => 'origin=247&destination='.$request->kota.'&weight=1700&courier='.$request->kurir,
                'headers' => array (
                    'key' => env('RAJAONGKIR_API_KEY','c6254e68e946ac3f5f7ba7e4adcbea0e'),
                    'content-type' => 'application/x-www-form-urlencoded',
                )
            )
        );
        } catch (RequestException $e) {
            //throw $th;
            var_dump($e->getResponse()->getBody()->getContents());
        }
        $json = $response->getBody()->getContents();

        $array_result = json_decode($json, true);

        return $array_result['rajaongkir']['results'][0];

        
    }
}
