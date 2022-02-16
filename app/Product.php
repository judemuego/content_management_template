<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'product_name',
        'color',
        'class_name',
        'unit_price'

    ];
}
