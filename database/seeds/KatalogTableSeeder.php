<?php

use Illuminate\Database\Seeder;

class KatalogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('katalog')->insert(
            [
                'nama_paket'=>'Paket A',
                'deskripsi_paket' => 'full set, atas full printing, nomor celana polyflex / sablon/bordir',
                'harga_paket' => '135000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        );
    }
}
