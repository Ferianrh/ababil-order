<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(RolesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(CourierTableSeeder::class);
        $this->call(PelangganTableSeeder::class);
        $this->call(JenisJahitTableSeeder::class);
        $this->call(KainTableSeeder::class);
        $this->call(KatalogTableSeeder::class);
        $this->call(UkuranTableSeeder::class);
        $this->call(SisiPrintTableSeeder::class);
        $this->call(CustomPrintTableSeeder::class);

        
    }
}
