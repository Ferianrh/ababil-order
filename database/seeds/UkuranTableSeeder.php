<?php

use Illuminate\Database\Seeder;

class UkuranTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ukuran')->insert(
            [   
                'id_jahit' => 1,
                'singkatan_ukuran' => 'S',
                'nama_ukuran' => 'Dewasa',
                'detil_ukuran' => 'Badan(72x49,2) X Lengan (60 / 24)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );

        DB::table('ukuran')->insert(
            [
                'id_jahit' => 1,
                'singkatan_ukuran' => 'M',
                'nama_ukuran' => 'Dewasa',
                'detil_ukuran' => 'Badan(75x52) X Lengan (62 / 25)',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
