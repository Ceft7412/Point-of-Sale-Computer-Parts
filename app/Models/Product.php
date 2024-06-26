<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table        = "products";
    protected $primaryKey   = "id";

    protected $fillable = [
        "subcategory_id",
        "product_name",
        "product_image",    
        "product_price",
        "product_quantity",
    ];  

    public function subcategory(){
        return $this->belongsTo(Subcategory::class);
    }
    public function items(){
        return $this->hasMany(Item::class);
    }
}
