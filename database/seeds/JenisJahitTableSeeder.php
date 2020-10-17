<?php

use Illuminate\Database\Seeder;

class JenisJahitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('jenis_jahit')->insert(
            [
                'nama_jahit' => 'Reglan',
                'Deskripsi_jahit' => 'Lengan kera',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        DB::table('jenis_jahit')->insert(
            [
                'nama_jahit' => 'Non-Reglan',
                'Deskripsi_jahit' => 'Lengan tanpa kera',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
        
    }
}
