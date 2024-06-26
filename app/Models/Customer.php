<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';


    protected $fillable = [
        'customer_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'membership_id'
    ];

    public function membership()
    {
    return $this->belongsTo(Member::class);
    }
}
