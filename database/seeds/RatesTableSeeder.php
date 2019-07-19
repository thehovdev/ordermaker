<?php

use Illuminate\Database\Seeder;

class RatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rates')->insert([
            [
                'name' => 'First Rate',
                'price' => 30
            ],
            [
                'name' => 'Second Rate',
                'price' => 50
            ]
        ]);
    }
}
