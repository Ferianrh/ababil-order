<?php

use Illuminate\Database\Seeder;

class CustomPrintTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('custom_print')->insert(
            [
                'id_print' => '1',
                'id_ukuran' => '1',
                'id_jahit' =>'1',
                'harga' => '17000',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')

            ]
        );
    }
}
