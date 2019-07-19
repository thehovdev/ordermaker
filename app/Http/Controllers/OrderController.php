<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Delivery;
use App\Product;
use App\Client;
use App\Order;
use App\Rate;

class OrderController extends Controller
{
    public function insert(Request $request) {
        $order = new Order; 
        $client = new Client;

        // валидация нужных параметров и их типов
        $request->validate([
            'phone' => 'required|numeric',
            'name' => 'required|string',
            'address' => 'required|string',
            'rate' => 'required|integer',
            'delivery' => 'required|integer',
            'product' => 'required|integer'
        ]);

        // записываем данные в переменные
        $phone = $request->phone;
        $name = $request->name;
        $address = $request->address;
        $rate_id = $request->rate;
        $delivery_id = $request->delivery;
        $product_id = $request->product;

        // если клиента нет то добавляем в базу или получаем ид существующего клиента
        $client = $client->firstOrCreate(
            ['phone' => $phone],
            ['name' => $name]
        );

        // тут должно быть все понятно
        $product_price = Product::getProductPriceById($product_id);
        $rate_price = Rate::getRatePriceById($rate_id);
        $price = $product_price + $rate_price;

        // записываем в базу данных
        $order = new Order;
        $order->client_id = $client->id;
        $order->delivery_id = $delivery_id;
        $order->rate_Id = $delivery_id;
        $order->product_id = $product_id;
        $order->price = $price;
        $order->address = $address;
        $order->save();

        // возвращаем ответ в json для ajax
        $data['status'] = 1;
        $data['message'] = 'success';

        return response()->json($data);
    }



    public function listLowOrders() {
        $client = new Client;
        $clients = $client->all();

        // 1. Выбрать для каждлого клиента количество заказов
        // ценой меньше 1000 и больше 1000. (client_id, count1, count2)
        foreach($clients as $client) {
            // тут используем laravel relations
            $client->ordersLowPrice = $client->orders->where('price', '<', 1000);
        }

        return view('listLowOrders')
            ->with('clients', $clients);

    }


    public function listLastOrders() {
        $order = new Order;
        $client = new Client;
        $clients = $client->all();

        // 2. Выбрать третий заказ для каждого клиента ( id, client_id, price)
        // Честно говоря не совсем понял что значит выбрать трейти заказ для каждого клиента
        // Поэтому сделал выборку 3х полей а именно id, client_id, price 
        // из последних 3х заказов клиента

        foreach($clients as $client) {
            $client->lastOrders = $order->lastOrders($client->id);
        }

        return view('listLastOrders')
            ->with('clients', $clients);
    }


    public function listHighOrders() {
        $client = new Client;
        $order = new Order;
        $clients = $client->all();

        // 3. Выбрать третий заказ для каждого клиента среди заказов у 
        // которых цена больше 1000 (id, client_id, price)
        foreach($clients as $client) {
            $client->highOrders = $order->highOrders($client->id);
        }

        return view('listHighOrders')
            ->with('clients', $clients);
    
    }
}
