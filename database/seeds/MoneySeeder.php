<?php

use Illuminate\Database\Seeder;

class MoneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('money')->insert(
            [
                'name'=>'EUR',
                'symbol'=>'€',
                'main_currency'=>0,
                'factor' => 80
            ]
        );
        DB::table('money')->insert(

            [
                'name'=>'USD',
                'symbol'=>'$',
                'main_currency'=>0,
                'factor' => 74
            ]

        );
        DB::table('money')->insert(


            [
                'name'=>'RUB',
                'symbol'=>'Р',
                'main_currency'=>1,
                'factor' => 1
            ]
        );
    }
}
