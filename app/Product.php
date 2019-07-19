<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = ['id'];

    public static function getProductPriceById($id) {
        return self::find($id)->price;
    }
}
