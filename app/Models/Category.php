<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;




use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table        = "categories";
    protected $primaryKey   = "id";

    protected $fillable = [
        "category_id",
        "category_name",
        "category_description", 
        "category_image",
    ];  

    public function subcategories()
    {
    return $this->hasMany(Subcategory::class);
    }
}
