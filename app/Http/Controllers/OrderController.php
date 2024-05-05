<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if ($user && $user->type == 2) {
            $employee = $user;
        } else {
            $employee = null;
        }


        $search = request()->query('search');
        if ($search) {
            $products = Product::where('is_active', 1)->where('product_id', 'like', '%' . $search . '%')->get();
            $categories = Category::where('is_active', 1)->get();
            $subcategories = Subcategory::where('is_active', 1)->get();
            return view('employee.order')
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('subcategories', $subcategories)
                ->with('employee', $employee);
        } else {
            $categories = Category::where('is_active', 1)->get();
            $subcategories = Subcategory::where('is_active', 1)->get();
            $products = Product::where('is_active', 1)->where('product_quantity', '!=', 0)->get();
            return view('employee.order')
                ->with('products', $products)
                ->with('categories', $categories)
                ->with('subcategories', $subcategories)
                ->with('employee', $employee);
        }
    }

    public function storeOrder(Request $request)
    {
        $productItems = json_decode($request->input('productItems'), true);
        $order = new Order();   
        do {
            $order_id = rand(100000, 999999);
        } while (Order::where('order_id', $order_id)->exists());
        foreach ($productItems as $item) {
            $id = $item['product_id'];
            $name = $item['product_name'];
            $price = $item['product_price'];
            $quantity = $item['product_quantity'];

            // Process the item...
        }
    }



    public function getProduct($id)
    {
        $products = Product::where('category_id', $id)->where('is_active', 1)->get();
        $products->each(function ($product) {
            $product->product_image = Storage::url($product->product_image);
        });
        return response()->json($products);
    }

    public function getSubcategoryProduct($id)
    {
        $products = Product::where('subcategory_id', $id)->where('is_active', 1)->get();
        $products->each(function ($product) {
            $product->product_image = Storage::url($product->product_image);
        });
        return response()->json($products);
    }

    public function allProducts()
    {
        $products = Product::where('is_active', 1)->get();
        $products->each(function ($product) {
            $product->product_image = Storage::url($product->product_image);
        });
        return response()->json($products);
    }



}
