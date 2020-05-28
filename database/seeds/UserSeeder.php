<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Admin','role_id'=> 1 ,'phone' => 'admin', 'password' =>'$2y$10$J/qrtLfDjNmEXW4JED7GLut6CIQo9wrryt0iRkcofFybTeR/Su5ne']
        ]);
    }
}
