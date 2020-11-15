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
                'gambar_desain' => 'A.jpeg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        );

        DB::table('katalog')->insert(
            [
                'nama_paket'=>'Custom Print',
                'deskripsi_paket' => 'Print custom adalah jasa percetakan printing khusus kaos. Yang dibutuhkan hanya mengirim kain yang akan di print ketempat produksi kami,lalu akan d kerjakan sesuai desain yang kamu inginkan..',
                'harga_paket' => null,
                'gambar_desain' => 'oblong.jpg',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        );
    }
}
