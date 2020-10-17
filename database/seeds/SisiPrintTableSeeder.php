<?php

use Illuminate\Database\Seeder;

class SisiPrintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sisi_print')->insert(
            [
                'keterangan_print' => 'badan tanpa lengan 1 sisi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
        );

        DB::table('sisi_print')->insert(
            [
                'keterangan_print' => 'badan tanpa lengan 1 sisi',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        );
    }
}
