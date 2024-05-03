<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Subcategory;
class OrderController extends Controller
{
    public function index(){
        $categories = Category::where('is_active', 1)->get();
        $subcategories = Subcategory::where('is_active', 1)->get();
        $products = Product::where('is_active', 1)->where('product_quantity', 0)->get();
        return view('employee.order')
                                    ->with('products', $products)
                                    ->with('categories', $categories)
                                    ->with('subcategories', $subcategories);

    }



}
