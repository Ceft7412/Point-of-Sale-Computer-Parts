<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';


    protected $fillable = [
        'order_id',
        'order_item_id',
        'product_id', 
        'item_name',
        'item_price',
        'item_quantity',
    ];

}
