<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    protected $table       = "subcategories";
    protected $primaryKey  = "id";

    protected $fillable = [
        "subcategory_id",
        "category_id",
        "subcategory_name",
        "subcategory_description",
        "subcategory_image",
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
