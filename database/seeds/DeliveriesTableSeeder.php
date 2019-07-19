<?php

use Illuminate\Database\Seeder;

class DeliveriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('deliveries')->insert([
            [
                'rate_id' => 1,
                'name' => 'One day delivery'
            ],
            [
                'rate_id' => 2,
                'name' => 'Two day delivery',
            ]
        ]);
    }
}
