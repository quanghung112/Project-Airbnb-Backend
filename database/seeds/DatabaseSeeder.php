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
//        $this->call(UserSeederTable::class);
        $this->call(HouseTableSeeder::class);
//        $this->call(ImagePostTableSeeder::class);
    }
}
