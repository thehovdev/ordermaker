<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rate extends Model
{
    protected $guarded = ['id'];

    public static function getRatePriceById($id) {
        return self::find($id)->price;
    }
}
