<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function client() {
        return $this->belongsTo('App\Client');
    }

    public function product() {
        return $this->belongsTo('App\Product');
    }

    public function lastOrders($client_id) {
        return $this->where('client_id', $client_id)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get(['id', 'client_id', 'price']);
    }

    public function highOrders($client_id) {
        return $this->where('client_id', $client_id)
            ->orderBy('id', 'desc')
            ->where('price', '>', 1000)
            ->take(3)
            ->get(['id', 'client_id', 'price']);
    }

}
