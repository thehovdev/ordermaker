<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'First Product',
                'price' => 900
            ],
            [
                'name' => 'Second Product',
                'price' => 1000
            ],
            [
                'name' => 'Last Product',
                'price' => 1100
            ]
        ]);
    }
}
