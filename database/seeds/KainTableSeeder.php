<?php

use Illuminate\Database\Seeder;

class KainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kain')->insert(
            [
                'nama_kain' => 'Kain Premium',
                'deskripsi_kain' => 'Kain Premium Grade A',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        DB::table('kain')->insert(
            [
                'nama_kain' => 'df pique',
                'deskripsi_kain' => 'corak rajutan padat pada permukaan kainnya',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
