<?php

use Illuminate\Database\Seeder;

class PelangganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pelanggan')->insert(
            [
                'id' => '2',
                'nama_lengkap' => 'Santri Dewantara',
                'tanggal_lahir' => '1997-09-14',
                'alamat_lengkap' => 'Jl. Uhuy Surabaya',
                'no_hp' => '087702529085',
                'email'=> 'cihuy@gmail.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]


        );
    }
}
