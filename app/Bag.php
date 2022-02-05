<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bag extends Model
{
    protected $fillable = [
        'id',
        'class_code',
        'bag_type'
    ];
}
