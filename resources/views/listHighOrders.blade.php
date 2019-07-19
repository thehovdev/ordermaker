@extends('layouts/app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h3>Заказы клиентов с ценой более 1000</h3>
            @foreach ($clients as $client)
                <table class="table table-dark">
                    <thead>
                        <tr>
                        <th scope="col">Order ID</th>
                        <th scope="col">Client ID</th>
                        <th scope="col">Total price</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- чтобы 2 раза не брать данные с базы, записываем данные в переменную --}}
                        
                        {{-- используем переменную тут и ниже--}}
                        @foreach($client->highOrders as $order)
                            <tr>
                                <th scope="row">{{ $order->id }}</th>
                                <td>{{ $order->client_id }}</td>
                                <td>{{ $order->price }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    </div>
@endsection