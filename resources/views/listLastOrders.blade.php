@extends('layouts/app')

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <h3>Три последних заказа для каждого клиента</h3>
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
                        @foreach($client->lastOrders as $order)
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
