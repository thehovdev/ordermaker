<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ['id'];

    public function orders() {
        return $this->hasMany('App\Order');
    }

    public function lastOrders() {
        return $this->hasMany('App\Order')->orderBy('id', 'desc')->take(3);
    }
}
