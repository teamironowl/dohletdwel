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
        $this->call(StateDivisionTableSeeder::class);
        $this->call(TownshipTableSeeder::class);
        $this->call(UserSeeder::class);
    }
}
