<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable =
        [
            'product_name',
            'quantity_in_stock',
            'price_per_item',
            'total_value_numbers'
        ];
}
