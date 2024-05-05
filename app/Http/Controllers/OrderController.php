<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Item;
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
        $orderItems = $request->input('order');

        $order_total = $request->order_total;
        $order_total = preg_replace('/[^0-9.]/', '', $order_total); // Remove non-numeric characters
        $order_total = intval($order_total); // Convert to integer
        $order = new Order();
        $order->order_id = $this->generateOrderID();
        $order->customer_id = 1;
        
        $order->user_id = Auth::id();
        $order->order_total = $order_total;
        $order->save();

        foreach ($orderItems as $item) {
            $orderItem = new Item();
            $orderItem->order_id = $order->id;
            $orderItem->order_item_id = $this->generateOrderItemID();
            $orderItem->product_id = $item['productId'];
            $orderItem->product_name = $item['productName'];
            $orderItem->price = $item['productPrice'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->subtotal = $item['productPrice'] * $item['quantity'];
            $orderItem->save();
        }
        return redirect()->back()->with('success', 'Order completed.');
    }


    public function generateOrderID()
    {
        $order_id = rand(100000, 999999);
        if (Order::where('order_id', $order_id)->exists()) {
            $this->generateOrderID();
        } else {
            return $order_id;
        }
    }
    public function generateOrderItemID()
    {
        $order_item_id = rand(100000, 999999);
        if (Item::where('order_item_id', $order_item_id)->exists()) {
            $this->generateOrderItemID();
        } else {
            return $order_item_id;
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
