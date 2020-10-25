<?php

use Illuminate\Database\Seeder;
use App\Models\Kurir;

class CourierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $data =[
            ['kode_kurir' =>'jne', 'nama_kurir'=>'JNE'],
            ['kode_kurir' =>'pos', 'nama_kurir'=>'POS'],
            ['kode_kurir' =>'tiki', 'nama_kurir'=>'TIKI']
        ];

        Kurir::insert($data);
    }
}
