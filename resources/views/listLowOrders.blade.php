@extends('layouts/app')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <h3>Заказы клиентов с ценой менее 1000</h3>
        
        @foreach ($clients as $client)

            <table class="table table-dark">
                <thead>
                    <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Total price</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Total orders count</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- чтобы 2 раза не брать данные с базы, записываем данные в переменную --}}
                    
                    {{-- используем переменную тут и ниже--}}
                    @foreach($client->ordersLowPrice as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->client->name }}</td>
                            <td>{{ $order->client->phone }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->product->name }}</td>
                            {{-- используем переменную тут тоже--}}
                            <td>{{ $client->ordersLowPrice->count() }}                                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endforeach
    </div>
</div>

@endsection
