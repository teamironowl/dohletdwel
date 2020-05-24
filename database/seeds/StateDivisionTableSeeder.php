<?php

use Illuminate\Database\Seeder;

class StateDivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('state_divisions')->delete();
        
        DB::table('state_divisions')->insert([
            ['id'=>1, 'name'=>'ကချင်'],
            ['id'=>2, 'name'=>'ကယား'],
            ['id'=>3, 'name'=>'ကရင်'],
            ['id'=>4, 'name'=>'ချင်း'],
            ['id'=>5, 'name'=>'စစ်ကိုင်း'],
            ['id'=>6, 'name'=>'တနင်္သာရီ'],
            ['id'=>7, 'name'=>'ပဲခူး'],
            ['id'=>8, 'name'=>'မကွေး'],
            ['id'=>9, 'name'=>'မန္တလေး'],
            ['id'=>10, 'name'=>'မွန်'],
            ['id'=>11, 'name'=>'ရခိုင်'],
            ['id'=>12, 'name'=>'ရန်ကုန်'],
            ['id'=>13, 'name'=>'ရှမ်း'],
            ['id'=>14, 'name'=>'ဧရာ၀တီ'],
            ['id'=>15, 'name'=>'နေပြည်တော်'],
        ]);
    }
}
