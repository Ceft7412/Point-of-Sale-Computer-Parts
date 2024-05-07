<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $fillable = [
        'order_id',
        'customer_id',
        'user_id',
        'order_status',
        'order_change',
        'order_total',
    ];
}
