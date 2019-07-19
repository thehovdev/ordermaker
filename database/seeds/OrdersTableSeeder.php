<?php

use Illuminate\Database\Seeder;
use App\Rate;
use App\Product;


class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [1, 2, 3];
        $products = [1, 2, 3];
        
        foreach($clients as $client_id) {

            foreach($products as $product_id) {

                DB::table('orders')->insert([
                    [
                        'client_id' => $client_id,
                        'delivery_id' => 1,
                        'rate_id' => 1,
                        'product_id' => $product_id,
                        'price' => Product::getProductPriceById($product_id) + Rate::getRatePriceById(1),
                        'address' => 'Baku, Azerbaijan'
                    ],
             
                ]);
                
            }

        }
    }
}
